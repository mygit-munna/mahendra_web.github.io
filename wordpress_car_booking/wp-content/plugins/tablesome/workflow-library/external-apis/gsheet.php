<?php

namespace Tablesome\Workflow_Library\External_Apis;

use Tablesome\Includes\Modules\API_Credentials_Handler;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if (!class_exists('\Tablesome\Workflow_Library\External_Apis\GSheet')) {
    class GSheet
    {
        public $endpoint = 'https://sheets.googleapis.com';
        public $api_version = 'v4';
        public $integration = 'google';
        public $api_credentials_handler;
        public function __construct()
        {
            $this->api_credentials_handler = new API_Credentials_Handler();
        }

        public function is_active()
        {
            $data = $this->api_credentials_handler->get_api_credentials($this->integration);
            return $data["status"] == "success";
        }

        public function get_sheets_by_spreadsheet_id($spreadsheet_id, $include_grid_data = false)
        {
            $access_token = maybe_refresh_access_token_by_integration($this->integration);

            $url = "https://sheets.googleapis.com/{$this->api_version}/spreadsheets/{$spreadsheet_id}";
            $parameters = [
                'includeGridData' => $include_grid_data,
                'alt' => 'json',
            ];
            $url = add_query_arg($parameters, $url);
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token,
                ),
            ));

            $response_code = wp_remote_retrieve_response_code($response);
            $data = json_decode(wp_remote_retrieve_body($response), true);
            $response_failed = (is_wp_error($response) || !is_tablesome_success_response($response_code));
            $is_authorization_error = isset($data['error']['code']) && $data['error']['code'] == 401;
            $error_data = isset($data['error']) ? $data['error'] : [];

            if ($is_authorization_error) {
                Retry::set_integration($this->integration);
                return Retry::call([$this, 'get_sheets_by_spreadsheet_id'], [$spreadsheet_id, $include_grid_data]);
            }
            Retry::reset_count();
            if ($response_failed && !$is_authorization_error) {
                return [];
            }
            return $data;
        }

        public function add_records($data = array())
        {
            $spreadsheet_id = isset($data['spreadsheet_id']) ? $data['spreadsheet_id'] : '';
            $sheet_name = isset($data['sheet_name']) ? $data['sheet_name'] : '';
            // should be an array of arrays
            $values = isset($data['values']) ? $data['values'] : [];
            $range = isset($data['range']) ? $data['range'] : '';
            if (empty($spreadsheet_id) || empty($sheet_name) || empty($values) || empty($range)) {
                return;
            }
            $access_token = maybe_refresh_access_token_by_integration($this->integration);

            // Range where to look for Table
            $range = "$sheet_name!$range";

            $parameters = [
                "insertDataOption" => "INSERT_ROWS",
                "valueInputOption" => "RAW",
                'includeValuesInResponse' => true,
                'alt' => 'json',
            ];

            $url = "https://sheets.googleapis.com/{$this->api_version}/spreadsheets/{$spreadsheet_id}/values/{$range}:append";
            $url = add_query_arg($parameters, $url);

            $payload = [
                "values" => $values, // array of arrays
            ];

            $response = wp_remote_post($url, array(
                'method' => 'POST',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token,
                ),
                'body' => json_encode($payload),
            ));
            $response_code = wp_remote_retrieve_response_code($response);
            $data = json_decode(wp_remote_retrieve_body($response), true);
            $response_failed = (is_wp_error($response) || !is_tablesome_success_response($response_code));
            $is_authorization_error = isset($data['error']['code']) && $data['error']['code'] == 401;
            $error_data = isset($data['error']) ? $data['error'] : [];

            if ($is_authorization_error) {
                Retry::set_integration($this->integration);
                return Retry::call([$this, 'add_records'], [$data]);
            }

            Retry::reset_count();
            if ($response_failed && !$is_authorization_error) {
                return [];
            }
            return $data;
        }

        public function get_spreadsheet_records($spreadsheet_id, $params)
        {
            $sheet_name = isset($params['sheet_name']) ? $params['sheet_name'] : '';
            if (empty($spreadsheet_id) || empty($sheet_name)) {
                return;
            }
            $coordinates = isset($params['coordinates']) ? $params['coordinates'] : '';
            if (empty($range)) {
                $coordinates = "1:2"; // read first two rows by default
            }

            $range = "$sheet_name!$coordinates";
            $access_token = maybe_refresh_access_token_by_integration($this->integration);
            $url = "https://sheets.googleapis.com/{$this->api_version}/spreadsheets/{$spreadsheet_id}/values/{$range}";
            $parameters = [
                'alt' => 'json',
            ];
            $url = add_query_arg($parameters, $url);

            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token,
                ),
            ));

            $response_code = wp_remote_retrieve_response_code($response);
            $data = json_decode(wp_remote_retrieve_body($response), true);
            $response_failed = (is_wp_error($response) || !is_tablesome_success_response($response_code));
            $is_authorization_error = isset($data['error']['code']) && $data['error']['code'] == 401;
            $error_data = isset($data['error']) ? $data['error'] : [];

            if ($is_authorization_error) {
                Retry::set_integration($this->integration);
                return Retry::call([$this, 'get_spreadsheet_records'], [$spreadsheet_id, $params]);
            }

            Retry::reset_count();
            if ($response_failed && !$is_authorization_error) {
                return [];
            }

            return $data;
        }

    }
}
