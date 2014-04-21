<?php

$hookslist = array(
'announcements_start',
'announcements_end',
'attachment_start',
'attachment_end',
'calendar_do_addevent_start',
'calendar_do_addevent_end',
'calendar_addevent_start',
'calendar_addevent_end',
'calendar_do_editevent_start',
'calendar_do_editevent_end',
'calendar_editevent_start',
'calendar_editevent_end',
'calendar_move_start',
'calendar_move_end',
'calendar_do_move_start',
'calendar_do_move_end',
'calendar_approve_start',
'calendar_approve_end',
'calendar_unapprove_start',
'calendar_unapprove_end',
'calendar_event_start',
'calendar_event_end',
'calendar_dayview_start',
'calendar_event_end',
'calendar_weekview_end',
'calendar_end',
'editpost_start',
'editpost_deletepost',
'editpost_do_editpost_start',
'editpost_do_editpost_end',
'editpost_action_start',
'editpost_end',
'forumdisplay_start',
'forumdisplay_announcement',
'forumdisplay_thread',
'forumdisplay_end',
'global_start',
'global_end',
'index_start',
'index_end',
'managegroup_do_joinrequests_start',
'managegroup_do_joinrequests_end',
'managegroup_joinrequests_start',
'managegroup_joinrequests_end',
'managegroup_do_manageusers_start',
'managegroup_do_manageusers_end',
'managegroup_start',
'managegroup_end',
'member_do_register_start',
'member_do_register_end',
'member_register_coppa',
'member_register_agreement',
'member_register_start',
'member_register_end',
'member_activate_start',
'member_activate_emailupdated',
'member_activate_accountactivated',
'member_activate_form',
'member_resendactivation',
'member_do_resendactivation_start',
'member_do_resendactivation_end',
'member_lostpw',
'member_do_lostpw_start',
'member_do_lostpw_end',
'member_resetpassword_start',
'member_resetpassword_process',
'member_resetpassword_reset',
'member_resetpassword_form',
'member_do_login_start',
'member_do_login_end',
'member_login',
'member_logout_start',
'member_logout_end',
'member_profile_start',
'member_profile_end',
'member_do_emailuser_start',
'member_do_emailuser_end',
'member_emailuser_start',
'member_emailuser_end',
'memberlist_start',
'memberlist_search',
'memberlist_user',
'memberlist_end',
'misc_start',
'misc_markread_forum',
'misc_markread_end',
'misc_clearpass',
'misc_rules_start',
'misc_rules_end',
'misc_help_helpdoc_start',
'misc_help_helpdoc_end',
'misc_help_section_start',
'misc_help_section_end',
'misc_buddypopup_start',
'misc_buddypopup_end',
'misc_syndication_start',
'misc_syndication_end',
'misc_clearcookies',
'modcp_start',
'modcp_do_reports',
'modcp_reports_start',
'modcp_reports',
'modcp_allreports_start',
'modcp_modlogs_start',
'modcp_modlogs_filter',
'modcp_do_delete_announcement',
'modcp_delete_announcement',
'modcp_do_new_announcement_start',
'modcp_do_new_announcement_end',
'modcp_new_announcement',
'modcp_do_edit_announcement_start',
'modcp_do_edit_announcement_end',
'modcp_edit_announcement',
'modcp_announcements',
'modcp_do_modqueue_start',
'modcp_do_modqueue_end',
'modcp_modqueue_threads_end',
'modcp_modqueue_posts_end',
'modcp_modqueue_attachments_end',
'modcp_modqueue_end',
'modcp_do_editprofile_start',
'modcp_do_editprofile_update',
'modcp_do_editprofile_end',
'modcp_editprofile_start',
'modcp_editprofile_end',
'modcp_finduser_start',
'modcp_finduser_end',
'modcp_warninglogs_start',
'modcp_warninglogs_end',
'modcp_ipsearch_posts_start',
'modcp_ipsearch_users_start',
'modcp_ipsearch_end',
'modcp_iplookup_end',
'modcp_banning_start',
'modcp_banning',
'modcp_liftban_start',
'modcp_liftban_end',
'modcp_do_banuser_start',
'modcp_do_banuser_end',
'modcp_banuser_start',
'modcp_banuser_end',
'modcp_do_modnotes_start',
'modcp_do_modnotes_end',
'modcp_end',
'moderation_start',
'moderation_delayedmoderation',
'moderation_stick',
'moderation_removeredirects',
'moderation_deletethread',
'moderation_do_deletethread',
'moderation_deletepoll',
'moderation_do_deletepoll',
'moderation_approvethread',
'moderation_unapprovethread',
'moderation_deleteposts',
'moderation_do_deleteposts',
'moderation_mergeposts',
'moderation_do_mergeposts',
'moderation_move',
'moderation_threadnotes',
'moderation_do_threadnotes',
'moderation_merge',
'moderation_do_merge',
'moderation_split',
'moderation_do_split',
'moderation_removesubscriptions',
'newreply_do_newreply_start',
'newreply_do_newreply_end',
'newreply_start',
'newreply_end',
'newthread_do_newthread_start',
'newthread_do_newthread_end',
'newthread_start',
'newthread_end',
'online_today_start',
'online_today_end',
'online_start',
'online_user',
'online_end',
'polls_newpoll_start',
'polls_newpoll_end',
'polls_do_newpoll_start',
'polls_do_newpoll_process',
'polls_do_newpoll_end',
'polls_editpoll_start',
'polls_editpoll_end',
'polls_do_editpoll_start',
'polls_do_editpoll_process',
'polls_do_editpoll_end',
'polls_showresults_start',
'polls_showresults_end',
'polls_vote_start',
'polls_vote_process',
'polls_vote_end',
'polls_do_undovote_start',
'polls_do_undovote_process',
'polls_do_undovote_end',
'portal_do_login_start',
'portal_do_login_end',
'portal_start',
'portal_announcement',
'portal_end',
'printthread_start',
'printthread_post',
'printthread_end',
'private_do_search_start',
'private_do_search_process',
'private_do_search_end',
'private_results_start',
'private_results_end',
'private_advanced_search',
'private_send_do_send',
'private_do_send_end',
'private_send_start',
'private_send_end',
'private_read',
'private_read_end',
'private_tracking_start',
'private_tracking_end',
'private_do_tracking_start',
'private_do_tracking_end',
'private_folders_start',
'private_folders_end',
'private_do_folders_start',
'private_do_folders_end',
'private_empty_start',
'private_empty_end',
'private_do_empty_start',
'private_do_empty_end',
'private_do_stuff',
'private_delete_start',
'private_delete_end',
'private_export_start',
'private_export_end',
'private_do_export_start',
'private_do_export_end',
'private_start',
'private_end',
'ratethread_start',
'ratethread_process',
'ratethread_end',
'report_start',
'report_end',
'report_do_report_start',
'report_do_report_end',
'reputation_start',
'reputation_do_add_start',
'reputation_do_add_process',
'reputation_do_add_end',
'reputation_add_start',
'reputation_add_end',
'reputation_end',
'search_results_start',
'search_results_thread',
'search_results_end',
'search_results_post',
'search_results_end',
'search_do_search_process',
'search_do_search_process',
'search_do_search_process',
'search_do_search_process',
'search_do_search_process',
'search_do_search_start',
'search_do_search_process',
'search_do_search_end',
'search_thread_start',
'search_thread_process',
'search_do_search_end',
'search_start',
'search_end',
'sendthread_do_sendtofriend_start',
'sendthread_do_sendtofriend_end',
'sendthread_start',
'sendthread_end',
'showteam_start',
'showteam_end',
'showthread_start',
'showthread_poll_results',
'showthread_poll',
'showthread_ismod',
'showthread_threaded',
'showthread_linear',
'showthread_end',
'stats_start',
'stats_end',
'usercp_start',
'usercp_do_profile_start',
'usercp_do_profile_end',
'usercp_profile_start',
'usercp_profile_end',
'usercp_do_options_start',
'usercp_do_options_end',
'usercp_options_start',
'usercp_options_end',
'usercp_do_email_start',
'usercp_do_email_verify',
'usercp_do_email_changed',
'usercp_email',
'usercp_do_password_start',
'usercp_do_password_end',
'usercp_password',
'usercp_do_changename_start',
'usercp_do_changename_end',
'usercp_changename_start',
'usercp_changename_end',
'usercp_do_subscriptions_start',
'usercp_subscriptions_start',
'usercp_subscriptions_end',
'usercp_forumsubscriptions_start',
'usercp_forumsubscriptions_end',
'usercp_do_editsig_start',
'usercp_do_editsig_process',
'usercp_do_editsig_end',
'usercp_editsig_start',
'usercp_editsig_end',
'usercp_editsig_end',
'usercp_do_avatar_start',
'usercp_do_avatar_end',
'usercp_avatar_start',
'usercp_avatar_end',
'usercp_avatar_end',
'usercp_do_editlists_start',
'usercp_do_editlists_end',
'usercp_editlists_start',
'usercp_editlists_end',
'usercp_drafts_start',
'usercp_drafts_end',
'usercp_do_drafts_start',
'usercp_do_drafts_end',
'usercp_usergroups_start',
'usercp_usergroups_change_displaygroup',
'usercp_usergroups_leave_group',
'usercp_usergroups_join_group_request',
'usercp_usergroups_join_group',
'usercp_usergroups_end',
'usercp_attachments_start',
'usercp_attachments_end',
'usercp_do_attachments_start',
'usercp_do_attachments_end',
'usercp_do_notepad_start',
'usercp_do_notepad_end',
'usercp_notepad_start',
'usercp_notepad_end',
'usercp_end',
'warnings_do_warn_start',
'warnings_warning',
'warnings_warn_start',
'warnings_warn_end',
'warnings_do_revoke_start',
'warnings_view_start',
'warnings_view_end',
'warnings_warning',
'warnings_end',
'xmlhttp',
'admin_form_output_submit_wrapper*',
'admin_form_end*',
'admin_formcontainer_output_row*',
'admin_formcontainer_end*',
'admin_page_output_header',
'admin_page_output_footer',
'admin_page_output_tab_control_start*',
'admin_page_output_tab_control_end*',
'admin_page_output_nav_tabs_start*',
'admin_page_output_nav_tabs_end*',
'admin_config_attachment_types_begin',
'admin_config_attachment_types_add',
'admin_config_attachment_types_add_commit',
'admin_config_attachment_types_edit',
'admin_config_attachment_types_edit_commit',
'admin_config_attachment_types_delete',
'admin_config_attachment_types_delete_commit',
'admin_config_attachment_types_start',
'admin_config_badwords_begin',
'admin_config_badwords_add',
'admin_config_badwords_add_commit',
'admin_config_badwords_delete',
'admin_config_badwords_delete_commit',
'admin_config_badwords_edit',
'admin_config_badwords_edit_commit',
'admin_config_badwords_start',
'admin_config_banning_begin',
'admin_config_banning_add',
'admin_config_banning_add_commit',
'admin_config_banning_delete',
'admin_config_banning_delete_commit',
'admin_config_banning_start',
'admin_config_calendars_begin',
'admin_config_calendars_add',
'admin_config_calendars_add_commit',
'admin_config_calendars_permissions',
'admin_config_calendars_permissions_commit',
'admin_config_calendars_edit',
'admin_config_calendars_edit_commit',
'admin_config_calendars_delete',
'admin_config_calendars_delete_commit',
'admin_config_calendars_update_order',
'admin_config_calendars_update_order_commit',
'admin_config_help_documents_begin',
'admin_config_help_documents_add',
'admin_config_help_documents_add_section',
'admin_config_help_documents_add_section_commit',
'admin_config_help_documents_add_page',
'admin_config_help_documents_add_page_commit',
'admin_config_help_documents_edit',
'admin_config_help_documents_edit_section',
'admin_config_help_documents_edit_section_commit',
'admin_config_help_documents_edit_page',
'admin_config_help_documents_edit_page_commit',
'admin_config_help_documents_delete',
'admin_config_help_documents_delete_section_commit',
'admin_config_help_documents_delete_page_commit',
'admin_config_help_documents_start',
'admin_config_languages_begin',
'admin_config_languages_edit_properties',
'admin_config_languages_edit_properties_commit',
'admin_config_languages_quick_phrases',
'admin_config_languages_edit',
'admin_config_languages_edit_commit',
'admin_config_languages_start',
'admin_config_mod_tools_begin',
'admin_config_mod_tools_delete_post_tool',
'admin_config_mod_tools_delete_post_tool_commit',
'admin_config_mod_tools_delete_thread_tool',
'admin_config_mod_tools_delete_thread_tool_commit',
'admin_config_mod_tools_post_tools',
'admin_config_mod_tools_edit_thread_tool',
'admin_config_mod_tools_edit_thread_tool_commit',
'admin_config_mod_tools_add_thread_tool',
'admin_config_mod_tools_add_thread_tool_commit',
'admin_config_mod_tools_edit_post_tool',
'admin_config_mod_tools_edit_post_tool_commit',
'admin_config_mod_tools_add_post_tool',
'admin_config_mod_tools_add_post_tool_commit',
'admin_config_mod_tools_start',
'admin_config_menu*',
'admin_config_action_handler*',
'admin_config_permissions*',
'admin_config_mycode_begin',
'admin_config_mycode_toggle_status',
'admin_config_mycode_toggle_status_commit',
'admin_config_mycode_xmlhttp_test_mycode_start',
'admin_config_mycode_xmlhttp_test_mycode_end',
'admin_config_mycode_add',
'admin_config_mycode_add_commit',
'admin_config_mycode_edit',
'admin_config_mycode_edit_commit',
'admin_config_mycode_delete',
'admin_config_mycode_delete_commit',
'admin_config_mycode_start',
'admin_config_plugins_begin',
'admin_config_plugins_check',
'admin_config_plugins_activate',
'admin_config_plugins_deactivate',
'admin_config_plugins_activate_commit',
'admin_config_plugins_deactivate_commit',
'admin_config_plugins_plugin_list',
'admin_config_post_icons_begin',
'admin_config_post_icons_add',
'admin_config_post_icons_add_commit',
'admin_config_post_icons_add_multiple',
'admin_config_post_icons_add_multiple_commit',
'admin_config_post_icons_edit',
'admin_config_post_icons_edit_commit',
'admin_config_post_icons_delete',
'admin_config_post_icons_delete_commit',
'admin_config_post_icons_start',
'admin_config_profile_fields_begin',
'admin_config_profile_fields_add',
'admin_config_profile_fields_add_commit',
'admin_config_profile_fields_edit',
'admin_config_profile_fields_edit_commit',
'admin_config_profile_fields_delete',
'admin_config_profile_fields_delete_commit',
'admin_config_profile_fields_start',
'admin_config_settings_begin',
'admin_config_settings_delete_duplicates_commit',
'admin_config_settings_addgroup',
'admin_config_settings_addgroup_commit',
'admin_config_settings_editgroup',
'admin_config_settings_editgroup_commit',
'admin_config_settings_deletegroup',
'admin_config_settings_deletegroup_commit',
'admin_config_settings_add',
'admin_config_settings_add_commit',
'admin_config_settings_edit',
'admin_config_settings_edit_commit',
'admin_config_settings_delete',
'admin_config_settings_delete_commit',
'admin_config_settings_manage',
'admin_config_settings_manage_commit',
'admin_config_settings_change',
'admin_config_settings_change_commit',
'admin_config_settings_start',
'admin_config_smilies_begin',
'admin_config_smilies_add',
'admin_config_smilies_add_commit',
'admin_config_smilies_edit',
'admin_config_smilies_edit_commit',
'admin_config_smilies_delete',
'admin_config_smilies_delete_commit',
'admin_config_smilies_add_multiple',
'admin_config_smilies_add_multiple_step1',
'admin_config_smilies_add_multiple_step2',
'admin_config_smilies_add_multiple_commit',
'admin_config_smilies_mass_edit',
'admin_config_smilies_mass_edit_commit',
'admin_config_smilies_start',
'admin_config_spiders_begin',
'admin_config_spiders_add',
'admin_config_spiders_add_commit',
'admin_config_spiders_delete',
'admin_config_spiders_delete_commit',
'admin_config_spiders_edit',
'admin_config_spiders_edit_commit',
'admin_config_spiders_start',
'admin_config_thread_prefixes_begin',
'admin_config_thread_prefixes_add_prefix',
'admin_config_thread_prefixes_add_prefix_commit',
'admin_config_thread_prefixes_edit_prefix_start',
'admin_config_thread_prefixes_edit_prefix_commit',
'admin_config_thread_prefixes_delete_prefix',
'admin_config_thread_prefixes_delete_thread_prefix_commit',
'admin_config_thread_prefixes_start',
'admin_config_warning_begin',
'admin_config_warning_add_level',
'admin_config_warning_add_level_commit',
'admin_config_warning_edit_level',
'admin_config_warning_edit_level_commit',
'admin_config_warning_delete_level',
'admin_config_warning_delete_level_commit',
'admin_config_warning_add_type',
'admin_config_warning_add_type_commit',
'admin_config_warning_edit_type',
'admin_config_warning_edit_type_commit',
'admin_config_warning_delete_type',
'admin_config_warning_delete_type_commit',
'admin_config_warning_levels',
'admin_config_warning_start',
'admin_forum_announcements_begin',
'admin_forum_announcements_add',
'admin_forum_announcements_add_commit',
'admin_forum_announcements_edit',
'admin_forum_announcements_edit_commit',
'admin_forum_announcements_delete',
'admin_forum_announcements_delete_commit',
'admin_forum_announcements_start',
'admin_forum_attachments_begin',
'admin_forum_attachments_delete',
'admin_forum_attachments_delete_commit',
'admin_forum_attachments_stats',
'admin_forum_attachments_delete_orphans',
'admin_forum_attachments_delete_orphans_commit',
'admin_forum_attachments_orphans',
'admin_forum_attachments_step3',
'admin_forum_attachments_orphans_step2',
'admin_forum_attachments_orphans_step1',
'admin_forum_attachments_start',
'admin_forum_management_begin',
'admin_forum_management_copy',
'admin_forum_management_copy_commit',
'admin_forum_management_editmod',
'admin_forum_management_editmod_commit',
'admin_forum_management_deletemod',
'admin_forum_management_permissions',
'admin_forum_management_permissions_commit',
'admin_forum_management_permission_groups*',
'admin_forum_management_add',
'admin_forum_management_add_commit',
'admin_forum_management_edit',
'admin_forum_management_edit_commit',
'admin_forum_management_deletemod',
'admin_forum_management_deletemod_commit',
'admin_forum_management_delete',
'admin_forum_management_delete_commit',
'admin_forum_management_start',
'admin_forum_management_start_permissions_commit',
'admin_forum_management_start_moderators_commit',
'admin_forum_management_start_disporder_commit',
'admin_forum_moderation_queue_begin',
'admin_forum_moderation_queue_commit',
'admin_forum_moderation_queue_threads_commit',
'admin_forum_moderation_queue_posts_commit',
'admin_forum_moderation_queue_attachments_commit',
'admin_forum_moderation_queue_threads',
'admin_forum_moderation_queue_posts',
'admin_forum_moderation_queue_attachments',
'admin_forum_menu*',
'admin_forum_action_handler*',
'admin_forum_permissions*',
'admin_home_credits_begin',
'admin_home_credits_start',
'admin_home_index_begin',
'admin_home_index_start',
'admin_home_index_start_begin',
'admin_home_menu*',
'admin_home_action_handler*',
'admin_home_menu_quick_access*',
'admin_home_preferences_begin',
'admin_home_preferences_start',
'admin_home_preferences_start_commit',
'admin_home_version_check_begin',
'admin_home_version_check_start',
'admin_style_menu*',
'admin_style_action_handler*',
'admin_style_permissions*',
'admin_style_templates',
'admin_style_templates_add_set',
'admin_style_templates_add_template',
'admin_style_templates_add_template_commit',
'admin_style_templates_edit_set',
'admin_style_templates_edit_template',
'admin_style_templates_edit_template_commit',
'admin_style_templates_search_replace',
'admin_style_templates_find_updated',
'admin_style_templates_delete_set',
'admin_style_templates_delete_set_commit',
'admin_style_templates_delete_template',
'admin_style_templates_delete_template_commit',
'admin_style_templates_diff_report',
'admin_style_templates_diff_report_run',
'admin_style_templates_revert',
'admin_style_templates_revert_commit',
'admin_style_templates_set',
'admin_style_templates_start',
'admin_style_themes_begin',
'admin_style_themes_browse',
'admin_style_themes_import',
'admin_style_themes_import_commit',
'admin_style_themes_export',
'admin_style_themes_export_commit',
'admin_style_themes_add',
'admin_style_themes_add_commit',
'admin_style_themes_delete',
'admin_style_themes_delete_commit',
'admin_style_themes_edit',
'admin_style_themes_edit_commit',
'admin_style_themes_stylesheet_properties',
'admin_style_themes_stylesheet_properties_commit',
'admin_style_themes_edit_stylesheet_simple',
'admin_style_themes_edit_stylesheet_simple_commit',
'admin_style_themes_edit_stylesheet_advanced',
'admin_style_themes_edit_stylesheet_advanced_commit',
'admin_style_themes_delete_stylesheet',
'admin_style_themes_delete_stylesheet_commit',
'admin_style_themes_add_stylesheet',
'admin_style_themes_add_stylesheet_commit',
'admin_style_themes_set_default',
'admin_style_themes_set_default_commit',
'admin_style_themes_force',
'admin_style_themes_force_commit',
'admin_style_themes_start',
'admin_tools_adminlog_begin',
'admin_tools_adminlog_prune',
'admin_tools_adminlog_prune_commit',
'admin_tools_adminlog_start',
'admin_tools_get_admin_log_action*',
'admin_tools_backupdb_begin',
'admin_tools_backupdb_dlbackup',
'admin_tools_backupdb_dlbackup_commit',
'admin_tools_backupdb_delete',
'admin_tools_backupdb_delete_commit',
'admin_tools_backupdb_backup',
'admin_tools_backupdb_backup_disk_commit',
'admin_tools_backupdb_backup_download_commit',
'admin_tools_backupdb_start',
'admin_tools_cache_begin',
'admin_tools_cache_view',
'admin_tools_cache_rebuild',
'admin_tools_cache_rebuild_commit',
'admin_tools_cache_rebuild_commit',
'admin_tools_cache_start',
'admin_tools_file_verification_begin',
'admin_tools_file_verification_check',
'admin_tools_mailerrors_begin',
'admin_tools_mailerrors_prune',
'admin_tools_mailerrors_prune_delete_all_commit',
'admin_tools_mailerrors_prune_commit',
'admin_tools_mailerrors_view',
'admin_tools_mailerrors_start',
'admin_tools_maillogs_begin',
'admin_tools_maillogs_prune',
'admin_tools_maillogs_prune_delete_all_commit',
'admin_tools_mailerrors_prune_commit',
'admin_tools_maillogs_view',
'admin_tools_maillogs_start',
'admin_tools_modlog_begin',
'admin_tools_modlog_prune',
'admin_tools_modlog_prune_commit',
'admin_tools_modlog_start',
'admin_tools_menu*',
'admin_tools_action_handler*',
'admin_tools_menu_logs*',
'admin_tools_permissions*',
'admin_tools_optimizedb_begin',
'admin_tools_optimizedb_start',
'admin_tools_optimizedb_start_begin',
'admin_tools_php_info_phpinfo',
'admin_tools_php_info_begin',
'admin_tools_php_info_start',
'admin_tools_recount_rebuild',
'admin_tools_recount_rebuild_start',
'admin_tools_recount_rebuild_forum_counters',
'admin_tools_recount_rebuild_thread_counters',
'admin_tools_recount_rebuild_user_posts',
'admin_tools_recount_rebuild_attachment_thumbs',
'admin_tools_recount_rebuild_stats',
'admin_tools_recount_rebuild_output_list',
'admin_tools_statistics_begin',
'admin_tools_statistics_overall_begin',
'admin_tools_system_health_begin',
'admin_tools_system_health_utf8_conversion',
'admin_tools_system_health_utf8_conversion_commit',
'admin_tools_system_health_start',
'admin_tools_tasks_begin',
'admin_tools_tasks_add',
'admin_tools_tasks_add_commit',
'admin_tools_tasks_edit',
'admin_tools_tasks_edit_commit',
'admin_tools_tasks_delete',
'admin_tools_tasks_delete_commit',
'admin_tools_tasks_enable',
'admin_tools_tasks_enable',
'admin_tools_tasks_enable_commit',
'admin_tools_tasks_enable_commit',
'admin_tools_tasks_disable_commit',
'admin_tools_tasks_run',
'admin_tools_tasks_run_commit',
'admin_tools_tasks_logs',
'admin_tools_tasks_start',
'admin_tools_warninglog_begin',
'admin_tools_warninglog_do_revoke',
'admin_tools_warninglog_do_revoke_commit',
'admin_tools_warninglog_view',
'admin_tools_warninglog_start',
'admin_user_admin_permissions_begin',
'admin_user_admin_permissions_delete',
'admin_user_admin_permissions_delete_commit',
'admin_user_admin_permissions_edit',
'admin_user_admin_permissions_edit_commit',
'admin_user_admin_permissions_group',
'admin_user_admin_permissions_start',
'admin_user_banning_begin',
'admin_user_banning_prune',
'admin_user_banning_prune_commit',
'admin_user_banning_lift',
'admin_user_banning_lift_commit',
'admin_user_banning_edit',
'admin_user_banning_edit_commit',
'admin_user_banning_start',
'admin_user_banning_start_commit',
'admin_user_group_promotions_begin',
'admin_user_group_promotions_disable',
'admin_user_group_promotions_disable_commit',
'admin_user_group_promotions_delete',
'admin_user_group_promotions_delete_commit',
'admin_user_group_promotions_enable',
'admin_user_group_promotions_enable_commit',
'admin_user_group_promotions_edit',
'admin_user_group_promotions_edit_commit',
'admin_user_group_promotions_add',
'admin_user_group_promotions_add_commit',
'admin_user_group_promotions_logs',
'admin_user_group_promotions_start',
'admin_user_groups_begin',
'admin_user_groups_export_start',
'admin_user_groups_export_end',
'admin_user_groups_approve_join_request',
'admin_user_groups_deny_join_request',
'admin_user_groups_join_requests_start',
'admin_user_groups_join_requests_commit',
'admin_user_groups_add_leader',
'admin_user_groups_add_leader_commit',
'admin_user_groups_leaders',
'admin_user_groups_delete_leader',
'admin_user_groups_delete_leader_commit',
'admin_user_groups_edit_leader',
'admin_user_groups_edit_leader_commit',
'admin_user_groups_add',
'admin_user_groups_add_commit',
'admin_user_groups_edit',
'admin_user_groups_edit_commit',
'admin_user_groups_edit_graph_tabs*',
'admin_user_groups_edit_graph',
'admin_user_groups_delete',
'admin_user_groups_delete_commit',
'admin_user_groups_disporder',
'admin_user_groups_disporder_commit',
'admin_user_groups_start',
'admin_user_groups_start_commit',
'admin_user_mass_email_delete_commit',
'admin_user_menu*',
'admin_user_action_handler*',
'admin_user_permissions*',
'admin_user_titles_begin',
'admin_user_titles_add',
'admin_user_titles_add_commit',
'admin_user_titles_edit',
'admin_user_titles_edit_commit',
'admin_user_titles_delete',
'admin_user_titles_delete_commit',
'admin_user_titles_start',
'admin_user_users_begin',
'admin_user_users_avatar_gallery',
'admin_user_users_avatar_gallery_commit',
'admin_user_users_coppa_activate',
'admin_user_users_coppa_activate_commit',
'admin_user_users_add',
'admin_user_users_add_commit',
'admin_user_users_edit',
'admin_user_users_edit_commit',
'admin_user_users_delete',
'admin_user_users_delete_commit',
'admin_user_users_referrers',
'admin_user_users_ipaddresses',
'admin_user_users_merge',
'admin_user_users_merge_commit',
'admin_user_users_search',
'admin_user_users_inline',
'admin_user_users_start',
'archive_start',
'archive_announcement_start',
'archive_announcement_end',
'archive_thread_start',
'archive_thread_post',
'archive_thread_end',
'archive_forum_start',
'archive_forum_thread',
'archive_forum_thread',
'archive_forum_end',
'archive_index_start',
'archive_index_end',
'archive_end',
'class_moderation_close_threads*',
'class_moderation_open_threads*',
'class_moderation_stick_threads*',
'class_moderation_unstick_threads*',
'class_moderation_remove_redirects*',
'class_moderation_delete_thread_start*',
'class_moderation_delete_thread*',
'class_moderation_delete_poll*',
'class_moderation_approve_threads*',
'class_moderation_unapprove_threads*',
'class_moderation_delete_post_start*',
'class_moderation_delete_post*',
'class_moderation_merge_posts*',
'class_moderation_move_thread_redirect*',
'class_moderation_copy_thread*',
'class_moderation_move_simple*',
'class_moderation_merge_threads*',
'class_moderation_split_posts*',
'class_moderation_move_threads*',
'class_moderation_change_thread_subject*',
'class_moderation_expire_thread*',
'class_moderation_remove_thread_subscriptions*',
'class_moderation_apply_thread_prefix*',
'parse_message_start*',
'parse_message*',
'parse_message_end*',
'text_parse_message*',
'pre_output_page*',
'post_output_page',
'send_mail_queue_start',
'send_mail_queue_mail*',
'send_mail_queue_end',
'my_date*',
'error*',
'no_permission',
'redirect*',
'mycode_add_codebuttons*',
'mark_reports*',
'functions_fetch_ban_times*',
'build_forumbits_forum*',
'fetch_wol_activity_end*',
'build_friendly_wol_location_end*',
'postbit_prev*',
'postbit_pm*',
'postbit_announcement*',
'postbit*',
'parse_quoted_message*',
'remove_attachment_do_delete*',
'remove_attachments_do_delete*',
'remove_avatars_do_delete*',
'upload_avatar_end*',
'upload_attachment_do_insert*',
'upload_file_end*',
'password_changed',
'usercp_menu',
'usercp_menu_built',
'datahandler_event_validate*',
'datahandler_event_insert*',
'datahandler_event_update*',
'datahandler_pm_validate*',
'datahandler_pm_insert_updatedraft*',
'datahandler_pm_insert*',
'datahandler_pm_insert_savedcopy*',
'datahandler_post_validate_post*',
'datahandler_post_insert_post*',
'datahandler_post_insert_post*',
'datahandler_post_validate_thread*',
'datahandler_post_insert_thread*',
'datahandler_post_insert_thread_post*',
'datahandler_post_insert_thread*',
'datahandler_post_insert_thread_post*',
'datahandler_post_update_thread*',
'datahandler_post_update*',
'datahandler_user_validate*',
'datahandler_user_insert*',
'datahandler_user_update*',
);

?>