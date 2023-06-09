<?php

namespace WPDataAccess\Plugin_Table_Models {

	use WPDataAccess\CSV_Files\WPDA_CSV_Import;
	use WPDataAccess\WPDA;

	class WPDA_CSV_Uploads_Model extends WPDA_Plugin_Table_Base_Model {

		const BASE_TABLE_NAME = 'wpda_csv_uploads';

		public static function query( $csv_id ) {
			global $wpdb;
			return $wpdb->get_results(
				$wpdb->prepare(
					'select * from `%1s` where csv_id = %d', // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders
					array(
						WPDA::remove_backticks( static::get_base_table_name() ),
						$csv_id,
					)
				)
			);
		}

		public static function insert( $csv_name, $real_file_name, $orig_file_name ) {
			global $wpdb;
			if ( 1 === $wpdb->insert(
				static::get_base_table_name(),
				array(
					'csv_name'           => $csv_name,
					'csv_real_file_name' => $real_file_name,
					'csv_orig_file_name' => $orig_file_name,
					'csv_timestamp'      => date( 'Y-m-d H:i:s' ),
				)
			)
			) {
				return $wpdb->insert_id;
			} else {
				return false;
			}
		}

		public static function update( $csv_id, $real_file_name, $orig_file_name ) {
			global $wpdb;
			return ( 1 === $wpdb->update(
				static::get_base_table_name(),
				array(
					'csv_real_file_name' => $real_file_name,
					'csv_orig_file_name' => $orig_file_name,
					'csv_timestamp'      => date( 'Y-m-d H:i:s' ),
				),
				array(
					'csv_id' => $csv_id,
				)
			)
				);
		}

		public static function save_mapping() {
			header( 'Content-Type: text/plain; charset=utf-8' );
			if (
				! isset( $_REQUEST['csv_id'] ) ||
				! isset( $_REQUEST['csv_mapping'] ) ||
				! isset( $_REQUEST['wpnonce'] )
			) {
				echo 'INV-Wrong arguments';
				return;
			}

			$csv_id = sanitize_text_field( wp_unslash( $_REQUEST['csv_id'] ) ); // input var okay.

			// Check if actions is allowed
			$wp_nonce = isset( $_REQUEST['wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['wpnonce'] ) ) : ''; // input var okay.
			if ( ! wp_verify_nonce( $wp_nonce, "wpda-csv-mapping-{$csv_id}" ) ) {
				echo 'INV-Not authorized';
				return;
			}

			$csv_mapping = json_encode(
				WPDA::sanitize_text_field_array( $_REQUEST['csv_mapping'], ['delimiter'] ) // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			);

			global $wpdb;
			$wpdb->suppress_errors( true );
			$rows_update = $wpdb->query(
				$wpdb->prepare(
					'update `%1s` set csv_mapping = %s where csv_id = %d', // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders
					array(
						WPDA::remove_backticks( static::get_base_table_name() ),
						$csv_mapping,
						$csv_id,
					)
				)
			);

			echo '' === $wpdb->last_error ? 'UPD-' . esc_attr( $rows_update ) : 'ERR-' . $wpdb->last_error; // phpcs:ignore WordPress.Security.EscapeOutput
		}

		public static function preview_mapping() {
			header( 'Content-Type: text/plain; charset=utf-8' );
			if (
				! isset( $_REQUEST['csv_id'] ) ||
				! isset( $_REQUEST['page_number'] ) ||
				! isset( $_REQUEST['page_length'] ) ||
				! isset( $_REQUEST['wpnonce'] )
			) {
				echo 'INV-Wrong arguments';
				return;
			}

			$csv_id = sanitize_text_field( wp_unslash( $_REQUEST['csv_id'] ) ); // input var okay.

			// Check if actions is allowed
			$wp_nonce = isset( $_REQUEST['wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['wpnonce'] ) ) : ''; // input var okay.
			if ( ! wp_verify_nonce( $wp_nonce, "wpda-csv-preview-mapping-{$csv_id}" ) ) {
				echo 'INV-Not authorized';
				return;
			}

			$page_number = sanitize_text_field( wp_unslash( $_REQUEST['page_number'] ) ); // input var okay.
			$page_length = sanitize_text_field( wp_unslash( $_REQUEST['page_length'] ) ); // input var okay.

			$dbrow = self::query( $csv_id );

			global $wpdb;
			if ( '' !== $wpdb->last_error ) {
				echo 'ERR-' . $wpdb->last_error; // phpcs:ignore WordPress.Security.EscapeOutput
			}
			if ( 1 === $wpdb->num_rows ) {
				if ( ! isset( $dbrow[0]->csv_real_file_name ) ) {
					echo 'ERR-No file';
				} else {
					$upload_dir = WPDA::get_plugin_upload_dir();
					$file_name  = $upload_dir . $dbrow[0]->csv_real_file_name;

					@ini_set( 'auto_detect_line_endings', true );
					if ( false !== ( $fp = fopen( $file_name, 'rb' ) ) ) {
						$mapping            = isset( $dbrow[0]->csv_mapping ) ? json_decode( $dbrow[0]->csv_mapping, true ) : array();
						$delimiter          = isset( $mapping['settings']['delimiter'] ) ? $mapping['settings']['delimiter'] : ',';
						$has_header_columns = isset( $mapping['settings']['has_header_columns'] ) ? $mapping['settings']['has_header_columns'] : true;

						if ( '\\t' == $delimiter ) {
							$delimiter = "\t";
						}

						$start = ( $page_number - 1 ) * $page_length;
						if ( $start === 0 ) {
							$end = $page_length;
						} else {
							$end = $page_number * $page_length;
						}
						$next_page = $page_number + 1;
						$prev_page = $page_number - 1;
						if ( $prev_page < 1 ) {
							$prev_page = 1;
						}

						echo '<div style="text-align: right; margin-bottom: 10px;">';
						echo '<a href="javascript:void(0)" class="button" onclick="preview(' . esc_attr( $prev_page ) . ', ' . esc_attr( $page_length ) . ')">&lt;</a>';
						echo '&nbsp;';
						echo '<a href="javascript:void(0)" class="button" onclick="preview(' . esc_attr( $next_page ) . ', ' . esc_attr( $page_length ) . ')">&gt;</a>';
						echo '</div>';
						echo '<table class="wp-list-table widefat fixed striped rows">';

						$number_of_columns = 1;
						if ( 'false' !== $has_header_columns ) {
							echo '<thead>';
							if ( false !== ( $data = fgetcsv( $fp, 0, $delimiter, '"' ) ) ) {
								$number_of_columns = count( $data );//phpcs:ignore - 8.1 proof
								echo '<tr>';
								for ( $column = 0; $column < count( $data ); $column++ ) {//phpcs:ignore - 8.1 proof
									echo '<th>' . esc_attr( $data[$column] ) . '</th>';
								}
								echo '</tr>';
							}
							echo '</thead>';
						}

						$row = 0;
						$fnd = false;
						echo '<tbody>';
						while ( false !== ( $data = fgetcsv( $fp, 0, $delimiter, '"' ) ) ) {
							if ( $row >= $start && $row < $end ) {
								echo '<tr>';
								for ( $column = 0; $column < count( $data ); $column++ ) {//phpcs:ignore - 8.1 proof
									echo '<td>' . esc_attr( $data[$column] ) . '</td>';
								}
								echo '</tr>';
								$fnd = true;
							}

							$row++;
						}
						if ( ! $fnd ) {
							echo '<tr colspan="' . esc_attr( $number_of_columns ) . '"><td>' . __( 'No data found', 'wp-data-access' ) . '</td></tr>';
						}
						echo '</tbody>';
						echo '</table>';

						fclose( $fp );
					} else {
						echo 'ERR-File not found';
					}
				}
			} else {
				echo 'ERR-No data found';
			}
		}

	}

}
