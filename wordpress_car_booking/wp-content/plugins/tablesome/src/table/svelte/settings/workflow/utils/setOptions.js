export const setTriggerOptions=t=>{let i=t.workflow.optionsGetter,o=t.trigger.integration&&"tablesome"!=t.trigger.integration,e=t.trigger.integration&&"email"!=t.trigger.integration;if(t.trigger.integration&&null==t.workflow.optionsStatus[t.trigger.integration]&&o&&e){i({type:"posts",params:{integration_type:t.trigger.integration}})}if(t.trigger.integration&&t.trigger.form_id&&null==t.workflow.optionsStatus[t.trigger.integration+"_"+t.trigger.form_id]){i({type:"fields",params:{integration_type:t.trigger.integration,post_id:t.trigger.form_id}})}};export const setActionOptions=t=>{let i=t.workflow.optionsGetter;if(t.action.integration&&"tablesome"!=t.action.integration&&null==t.workflow.optionsStatus[t.action.integration]){let o={type:"posts",params:{integration_type:t.action.integration}};i(o)}let o=_getActionSourceId(t.action);if(o&&null==t.workflow.optionsStatus[t.action.integration+"_"+o]){let e={type:"fields",params:{integration_type:t.action.integration,post_id:o}};i(e)}if(_isPostTypeOptionUpdated(t)){i({type:"post_types",params:{get_post_types:"get_post_types"}})}if(_isTaxonomiesOptionUpdated(t)&&t.workflow.options.post_types.forEach((o=>{let e=o.id,n={type:"taxonomies",params:{post_type:e}};null==t.workflow.optionsStatus[e]&&i(n)})),_isUserRolesOptionsUpdated(t)){i({type:"user_roles",params:{get_user_roles:"get_user_roles"}})}if(_isUsersOptionsUpdated(t)){i({type:"users",params:{get_users:"get_users"}})}};const _getActionSourceId=t=>{let i=0,o=t.action_id?t.action_id:"",e=t.integration?t.integration:"";return"wordpress"==e&&t.post_type?i=t.post_type:"mailchimp"==e&&t.list_id?i=t.list_id:"notion"==e&&t.database_id?i=t.database_id:"hubspot"==e?i=-1:"slack"==e&&"13"==o?i="channels":"slack"==e&&"14"==o?i="users":"gsheet"==e&&t.spreadsheet_id&&(i=t.spreadsheet_id),i},_isPostTypeOptionUpdated=t=>{let i=t.trigger.integration&&"tablesome"==t.trigger.integration,o=t.action.action_id&&"4"==t.action.action_id,e=t.action.action_id&&"6"==t.action.action_id;return(i||o||e)&&null==t.workflow.optionsStatus.get_post_types},_isTaxonomiesOptionUpdated=t=>{let i=t.workflow.options.post_types.length,o=t.workflow.options.taxonomies.length<1;return i&&o},_isUserRolesOptionsUpdated=t=>{let i=!1,o=t.action.integration&&"wordpress"==t.action.integration,e=t.action.action_id&&"5"==t.action.action_id;return i=o&&e&&null==t.workflow.optionsStatus.get_user_roles,i},_isUsersOptionsUpdated=t=>t.trigger.integration&&"tablesome"==t.trigger.integration&&null==t.workflow.optionsStatus.get_users;