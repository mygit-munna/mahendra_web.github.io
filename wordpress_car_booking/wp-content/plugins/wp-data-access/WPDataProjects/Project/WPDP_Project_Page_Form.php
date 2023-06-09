<?php

/**
 * Suppress "error - 0 - No summary was found for this file" on phpdoc generation
 *
 * @package WPDataProjects\Project
 */

namespace WPDataProjects\Project {

	use WPDataAccess\Data_Dictionary\WPDA_Dictionary_Lists;
	use WPDataAccess\Plugin_Table_Models\WPDP_Project_Design_Table_Model;
	use WPDataAccess\Simple_Form\WPDA_Simple_Form_Item_Enum;
	use WPDataAccess\Simple_Form\WPDA_Simple_Form_Item_Set;
	use WPDataAccess\WPDA;
	use WPDataProjects\Parent_Child\WPDP_Child_Form;

	/**
	 * Class WPDP_Project_Page_Form extends WPDP_Child_Form
	 *
	 * @see WPDP_Child_Form
	 *
	 * @author  Peter Schulz
	 * @since   2.0.0
	 */
	class WPDP_Project_Page_Form extends WPDP_Child_Form {

		/**
		 * WPDP_Project_Page_Form constructor.
		 *
		 * @param       $schema_name
		 * @param       $table_name
		 * @param       $wpda_list_columns
		 * @param array $args
		 */
		public function __construct( $schema_name, $table_name, $wpda_list_columns, array $args = array() ) {
			// Add column labels.
			$args['column_headers'] = array(
				'project_id'             => __( 'Project ID', 'wp-data-access' ),
				'page_id'                => __( 'Page ID', 'wp-data-access' ),
				'add_to_menu'            => __( 'Add To Menu', 'wp-data-access' ),
				'page_name'              => __( 'Menu Name', 'wp-data-access' ),
				'page_type'              => __( 'Type', 'wp-data-access' ),
				'page_schema_name'       => __( 'Schema Name', 'wp-data-access' ),
				'page_table_name'        => __( 'Table Name', 'wp-data-access' ),
				'page_setname'           => __( 'Template Set Name', 'wp-data-access' ),
				'page_mode'              => __( 'Mode', 'wp-data-access' ),
				'page_allow_insert'      => __( 'Allow insert?', 'wp-data-access' ),
				'page_allow_delete'      => __( 'Allow delete?', 'wp-data-access' ),
				'page_allow_import'      => __( 'Allow import?', 'wp-data-access' ),
				'page_allow_bulk'        => __( 'Allow bulk actions?', 'wp-data-access' ),
				'page_allow_full_export' => __( 'Allow full table export?', 'wp-data-access' ),
				'page_content'           => __( 'Post', 'wp-data-access' ),
				'page_title'             => __( 'Title', 'wp-data-access' ),
				'page_subtitle'          => __( 'Subtitle', 'wp-data-access' ),
				'page_role'              => __( 'Role', 'wp-data-access' ),
				'page_where'             => __( 'WHERE Clause', 'wp-data-access' ),
				'page_orderby'           => __( 'Default ORDER BY', 'wp-data-access' ),
				'page_sequence'          => __( 'Seq#', 'wp-data-access' ),
			);

			parent::__construct( $schema_name, $table_name, $wpda_list_columns, $args );
		}

		/**
		 * Overwrites method prepare_items for specific user interaction
		 *
		 * @param bool $set_back_form_values
		 */
		protected function prepare_items( $set_back_form_values = false ) {
			parent::prepare_items( $set_back_form_values );

			// Get available databases
			$schema_names = WPDA_Dictionary_Lists::get_db_schemas();
			$databases    = array();
			foreach ( $schema_names as $schema_name ) {
				array_push( $databases, $schema_name['schema_name'] );//phpcs:ignore - 8.1 proof
			}

			$tables       = array();
			$column_index = $this->get_item_index( 'page_schema_name' );
			if ( false !== $column_index ) {
				$pub_schema_name = $this->form_items[ $column_index ]->get_item_value();
				if ( '' === $pub_schema_name || null === $pub_schema_name ) {
					$pub_schema_name = WPDA::get_user_default_scheme();
				}

				// Check table access to prepare table listbox content
				global $wpdb;
				if ( $wpdb->dbname === $pub_schema_name ) {
					$table_access = WPDA::get_option( WPDA::OPTION_BE_TABLE_ACCESS );
				} else {
					$table_access = get_option( WPDA::BACKEND_OPTIONNAME_DATABASE_ACCESS . $pub_schema_name );
					if ( false === $table_access ) {
						$table_access = 'show';
					}
				}
				switch ( $table_access ) {
					case 'show':
						$tables = $this->get_all_db_tables( $pub_schema_name );
						break;
					case 'hide':
						$tables = $this->get_all_db_tables( $pub_schema_name );
						// Remove WordPress tables from listbox content
						$tables_named = array();
						foreach ( $tables as $table ) {
							$tables_named[ $table ] = true;
						}
						foreach ( $wpdb->tables( 'all', true ) as $wp_table ) {
							unset( $tables_named[ $wp_table ] );
						}
						$tables = array();
						foreach ( $tables_named as $key => $value ) {
							array_push( $tables, $key );//phpcs:ignore - 8.1 proof
						}
						break;
					default:
						// Show only selected tables and views
						if ( $wpdb->dbname === $pub_schema_name ) {
							$tables = WPDA::get_option( WPDA::OPTION_BE_TABLE_ACCESS_SELECTED );
						} else {
							$tables = get_option( WPDA::BACKEND_OPTIONNAME_DATABASE_SELECTED . $pub_schema_name );
							if ( false === $tables ) {
								$tables = array();
							}
						}
				}
			}

			$i = 0;
			foreach ( $this->form_items as $item ) {
				if ( 'page_type' === $item->get_item_name() ) {
					$item_js =
						'function set_item_visibility(page_type) { ' .
						'  if (page_type===\'static\') { ' .
						'     jQuery(\'[name="page_content"]\').parent().parent().show(); ' .
						'     jQuery(\'[name="page_table_name"]\').parent().parent().hide(); ' .
						'     jQuery(\'[name="page_mode"]\').parent().parent().hide(); ' .
						'     jQuery(\'[name="page_allow_insert"]\').parent().parent().hide(); ' .
						'     jQuery(\'[name="page_allow_delete"]\').parent().parent().hide(); ' .
						'  } else { ' .
						'     jQuery(\'[name="page_table_name"]\').parent().parent().show(); ' .
						'     jQuery(\'[name="page_mode"]\').parent().parent().show(); ' .
						'     jQuery(\'[name="page_allow_insert"]\').parent().parent().show(); ' .
						'     jQuery(\'[name="page_allow_delete"]\').parent().parent().show(); ' .
						'     jQuery(\'[name="page_content"]\').parent().parent().hide(); ' .
						'  } ' .
						'} ' .
						'jQuery(function () { ' .
						'  jQuery(\'[name="page_type"]\').change(function() { ' .
						'    set_item_visibility(jQuery(this).val()); ' .
						'  }); ' .
						'  set_item_visibility(jQuery(\'[name="page_type"]\').val()); ' .
						'});';
					$item->set_item_js( $item_js );
				} elseif ( 'page_content' === $item->get_item_name() ) {
					$posts = get_posts(
						array(
							'post_status' => '%',
							'orderby'     => 'ID',
						)
					);

					$lov         = array();
					$lov_options = array();
					// For some reason get_posts always sorts DESC on ID: reverse array.
					$posts_reverse = array_reverse( $posts );//phpcs:ignore - 8.1 proof
					// Set first element to blank.
					array_push( $lov, '' );//phpcs:ignore - 8.1 proof
					array_push( $lov_options, '0' );//phpcs:ignore - 8.1 proof
					foreach ( $posts_reverse as $post ) {
						$post_element = $post->post_title . ' (ID=' . $post->ID . ')';
						array_push( $lov, $post_element );//phpcs:ignore - 8.1 proof
						array_push( $lov_options, $post->ID );//phpcs:ignore - 8.1 proof
					}

					$item->set_enum( $lov );
					$item->set_enum_options( $lov_options );
					$this->form_items[ $i ] = new WPDA_Simple_Form_Item_Enum( $item );
				} elseif ( 'page_schema_name' === $item->get_item_name() ) {
					// Prepare listbox for column pub_schema_name
					if ( '' === $item->get_item_value() || null === $item->get_item_value() ) {
						$item->set_item_value( WPDA::get_user_default_scheme() );
					}
					$item->set_enum( $databases );
					$this->form_items[ $i ] = new WPDA_Simple_Form_Item_Enum( $item );
				} elseif ( 'page_table_name' === $item->get_item_name() ) {
					$item->set_enum( $tables );
					$this->form_items[ $i ] = new WPDA_Simple_Form_Item_Enum( $item );
				} elseif ( 'page_role' === $item->get_item_name() ) {
					global $wp_roles;
					$lov         = array();
					$lov_options = array();
					foreach ( $wp_roles->roles as $role => $val ) {
						array_push( $lov_options, $role );//phpcs:ignore - 8.1 proof
						array_push( $lov, isset( $val['name'] ) ? $val['name'] : $role );//phpcs:ignore - 8.1 proof
					}
					$item->set_enum( $lov );
					$item->set_enum_options( $lov_options );
					$this->form_items[ $i ] = new WPDA_Simple_Form_Item_Set( $item );
				} elseif ( 'page_setname' === $item->get_item_name() ) {
					global $wpdb;
					$setnames = $wpdb->get_results(
						$wpdb->prepare(
							'select distinct wpda_table_setname from `%1s` order by wpda_table_setname', // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders
							array(
								WPDA::remove_backticks( WPDP_Project_Design_Table_Model::get_base_table_name() ),
							)
						),
						'ARRAY_A'
					);
					$lov      = array();
					foreach ( $setnames as $setname ) {
						array_push( $lov, $setname['wpda_table_setname'] );//phpcs:ignore - 8.1 proof
					}
					if ( 0 === count( $lov ) ) {//phpcs:ignore - 8.1 proof
						array_push( $lov, 'default' );//phpcs:ignore - 8.1 proof
					}
					$item->set_enum( $lov );
					$this->form_items[ $i ] = new WPDA_Simple_Form_Item_Enum( $item );
				} elseif ( 'page_allow_full_export' === $item->get_item_name() ) {
					if ( wpda_freemius()->is_free_plan() ) {
						$item->set_hide_item( true );
					}
				}
				$i ++;
			}
		}

		/**
		 * Get all db tables and views
		 *
		 * @param string $database Database schema name
		 *
		 * @return array
		 */
		protected function get_all_db_tables( $database ) {
			$tables    = array();
			$db_tables = WPDA_Dictionary_Lists::get_tables( true, $database ); // select all db tables and views
			foreach ( $db_tables as $db_table ) {
				//phpcs:ignore - 8.1 proof
				array_push( $tables, $db_table['table_name'] ); // add table or view to array
			}

			return $tables;
		}

		/**
		 * Overwrites method show
		 *
		 * @param bool   $allow_save
		 * @param string $add_param
		 */
		public function show( $allow_save = true, $add_param = '' ) {
			parent::show( $allow_save, $add_param );

			global $wpdb;
			?>
			<script type='text/javascript'>
				function update_table_list(schema_name) {
					var url = location.pathname + '?action=wpda_get_tables';
					var data = {
						wpdaschema_name: schema_name,
						wpda_wpnonce: '<?php echo esc_attr( wp_create_nonce( 'wpda-getdata-access-' . WPDA::get_current_user_login() ) ); ?>'
					};
					jQuery.post(
						url,
						data,
						function (data) {
							jQuery('#page_table_name').empty();

							var tables = JSON.parse(data);
							for (var i = 0; i < tables.length; i++) {
								jQuery('<option/>', {
									value: tables[i].table_name,
									html: tables[i].table_name
								}).appendTo("#page_table_name");
							}
						}
					);
				}
				jQuery(function () {
					jQuery("#page_schema_name option[value='<?php echo esc_attr( $wpdb->dbname ); ?>']").text("WordPress database (<?php echo esc_attr( $wpdb->dbname ); ?>)");
					jQuery('#page_allow_full_export').parent().parent().find('.icon').empty().append('<i title="Adds CSV and JSON full table export buttons to list tables\n\nWorks on back-end pages only" class="fas fa-circle-question pointer wpda_tooltip"></i>');
					jQuery('#page_schema_name').on('change', function () {
						update_table_list(jQuery(this).val());
					});
				});
			</script>
			<?php
		}

	}

}
