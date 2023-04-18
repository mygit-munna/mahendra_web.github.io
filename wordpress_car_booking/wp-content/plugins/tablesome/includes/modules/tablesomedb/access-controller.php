<?php

namespace Tablesome\Components\TablesomeDB;

if (!class_exists('\Tablesome\Components\TablesomeDB\Access_Controller')) {
    class Access_Controller
    {
        public function __construct()
        {
        }
        public function get_permissions($table_meta)
        {
            // $dummy_data = $this->get_dummy_data();
            $access_control = isset($table_meta['options']['access_control']) ? $table_meta['options']['access_control'] : [];
            $enable_frontend_editing = isset($access_control['enable_frontend_editing']) ? $access_control['enable_frontend_editing'] : false;

            $allowed_roles = isset($access_control['allowed_roles']) ? $access_control['allowed_roles'] : [];
            $allowed_roles[] = "administrator";
            $user = wp_get_current_user();
            $user_role = isset($user->roles[0]) ? $user->roles[0] : '';
            $user_can_allow_to_modify = in_array($user_role, $allowed_roles) ? true : false;
            $can_edit = $enable_frontend_editing && $user_can_allow_to_modify && tablesome_fs()->can_use_premium_code__premium_only() ? true : false;

            $editable_column_ids = [];
            $can_edit_columns = false;
            $can_delete_own_records = false;
            $record_edit_access = "";
            if ($can_edit) {
                $editable_column_ids = isset($access_control['editable_columns']) ? $access_control['editable_columns'] : $editable_column_ids;
                $can_edit_columns = count($editable_column_ids) > 0 ? true : false;
                $can_delete_own_records = isset($access_control['can_delete_own_records']) ? $access_control['can_delete_own_records'] : false;
                $record_edit_access = isset($access_control['record_edit_access']) ? $access_control['record_edit_access'] : '';
            }

            return [
                'enable_frontend_editing' => $enable_frontend_editing,
                'user_can_allow_to_modify' => $user_can_allow_to_modify,
                'can_edit' => $can_edit,
                'can_edit_columns' => $can_edit_columns,
                'editable_columns' => $editable_column_ids,
                'record_edit_access' => $record_edit_access,
                'can_delete_own_records' => $can_delete_own_records,
            ];
        }

        public function can_edit_record($record, $table_meta, $record_edit_access)
        {
            if ($record_edit_access == 'all_records') {
                return true;
            }
            $created_by = isset($record->author_id) ? $record->author_id : 0;
            $current_user_id = get_current_user_id();
            if ($record_edit_access == 'own_records' && $created_by == $current_user_id) {
                return true;
            }
            return false;
        }

        public function can_delete_record($record, $table_meta, $permissions)
        {
            $can_delete_own_records = isset($permissions['can_delete_own_records']) ? $permissions['can_delete_own_records'] : false;
            if (!$can_delete_own_records) {
                return false;
            }
            $created_by = isset($record->author_id) ? $record->author_id : 0;
            $current_user_id = get_current_user_id();
            if ($created_by == $current_user_id) {
                return true;
            }
            return false;
        }

        public function get_dummy_data()
        {
            $file_path = TABLESOME_PATH . "includes/data/dummy/frontend-editing-dummy.json";
            $dummydata = get_data_from_json_file('', $file_path);
            // error_log('$dummydata : ' . print_r($dummydata, true));

            return $dummydata;
        }
    }
}
