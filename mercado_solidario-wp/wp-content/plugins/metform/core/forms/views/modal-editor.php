<?php defined('ABSPATH') || exit; ?>

<div class="attr-modal attr-fade" id="metform_form_modal" tabindex="-1" role="dialog" aria-labelledby="metform_form_modalLabel" style="display:none;">
    <div class="attr-modal-dialog attr-modal-dialog-centered" id="metform-form-modalinput-form" role="document">
        <form action="" method="post" id="metform-form-modalinput-settings" data-open-editor="0" data-editor-url="<?php echo esc_url(get_admin_url()); ?>" data-nonce="<?php echo esc_attr(wp_create_nonce('wp_rest')); ?>">
            <input type="hidden" name="post_author" value="<?php echo esc_attr(get_current_user_id()); ?>">
            <div class="attr-modal-content">
                <div class="attr-modal-header">
                    <button type="button" class="attr-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="attr-modal-title" id="metform_form_modalLabel">
                        <?php esc_html_e('Form Settings', 'metform'); ?></h4>
                    <div id="message" style="display:none" class="attr-alert attr-alert-success mf-success-msg"></div>
                    <ul class="attr-nav attr-nav-tabs" role="tablist">
                        <li role="presentation" class="attr-active"><a href="#mf-general" aria-controls="general" role="tab" data-toggle="tab"><?php esc_html_e('General', 'metform'); ?></a>
                        </li>
                        <li role="presentation"><a href="#mf-confirmation" aria-controls="confirmation" role="tab" data-toggle="tab"><?php esc_html_e('Confirmation', 'metform'); ?></a>
                        </li>
                        <li role="presentation"><a href="#mf-notification" aria-controls="notification" role="tab" data-toggle="tab"><?php esc_html_e('Notification', 'metform'); ?></a>
                        </li>
                        <li role="presentation"><a href="#mf-integration" aria-controls="integration" role="tab" data-toggle="tab"><?php esc_html_e('Integration', 'metform'); ?></a>
                        </li>
                        <?php if (class_exists('MetForm_Pro\Base\Package')) : ?>
                            <li role="presentation"><a href="#mf-payment" aria-controls="payment" role="tab" data-toggle="tab"><?php esc_html_e('Payment', 'metform'); ?></a>
                            </li>
                            <li role="presentation"><a href="#mf-crm" aria-controls="crm" role="tab" data-toggle="tab"><?php esc_html_e('CRM', 'metform'); ?></a></li>
                        <?php endif; ?>

                        <?php do_action('mf_form_settings_tab'); ?>
                    </ul>
                </div>

                <div class="attr-tab-content">
                    <div role="tabpanel" class="attr-tab-pane attr-active" id="mf-general">

                        <div class="attr-modal-body" id="metform_form_modal_body">
                            <div class="mf-input-group">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Title:', 'metform'); ?></label>
                                <input type="text" name="form_title" class="mf-form-modalinput-title attr-form-control" data-default-value="<?php echo esc_html__('New Form # ', 'metform') . esc_attr(time()); ?>">
                                <span class='mf-input-help'><?php esc_html_e('This is the form title', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Success Message:', 'metform'); ?></label>
                                <input type="text" name="success_message" class="mf-form-modalinput-success_message attr-form-control" data-default-value="<?php esc_html_e('Thank you! Form submitted successfully.', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('This message will be shown after a successful submission.', 'metform'); ?></span>
                            </div>

                            <?php if (class_exists('\MetForm_Pro\Core\Features\Quiz\Integration')) : ?>
                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="quiz_summery" class="mf-admin-control-input mf-form-modalinput-quiz_result_show">
                                    <span><?php esc_html_e('Show Quiz Summary:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Quiz summary will be shown to user after form submission with success message.', 'metform'); ?></span>
                            </div>
                            <?php endif; ?>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="require_login" class="mf-admin-control-input mf-form-modalinput-require_login">
                                    <span><?php esc_html_e('Required Login:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Without login, users can\'t submit the form.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="capture_user_browser_data" class="mf-admin-control-input mf-form-modalinput-capture_user_browser_data">
                                    <span><?php esc_html_e('Capture User Browser Data:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Store user\'s browser data (ip, browser name, etc)', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="hide_form_after_submission" class="mf-admin-control-input mf-form-modalinput-hide_form_after_submission">
                                    <span><?php esc_html_e('Hide Form After Submission:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('After submission, hide the form for preventing multiple submission.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="store_entries" class="mf-admin-control-input mf-form-modalinput-store_entries">
                                    <span><?php esc_html_e('Store Entries:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Save submitted form data to database.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-entry-title">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Entry Title', 'metform'); ?></label>
                                <input type="text" name="entry_title" class="mf-entry-title-input attr-form-control" placeholder="Entry Title">
                                <span class="mf-input-help"><?php esc_html_e('Enter here title of this form entries.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <div class="mf-input-group-inner">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="limit_total_entries_status" class="mf-admin-control-input mf-form-modalinput-limit_status">
                                        <span><?php esc_html_e('Limit Total Entries:', 'metform'); ?></span>
                                    </label>
                                    <div class="mf-input-group" id='limit_status'>
                                        <input type="number" min="1" name="limit_total_entries" class="mf-form-modalinput-limit_total_entries attr-form-control">
                                    </div>
                                </div>
                                <span class='mf-input-help'><?php esc_html_e('Limit the total number of submissions for this form.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="count_views" class="mf-admin-control-input mf-form-modalinput-count_views">
                                    <span><?php esc_html_e('Count views:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Track form views.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="mf_stop_vertical_scrolling" class="mf-admin-control-input mf-form-modalinput-stop_vertical_scrolling">
                                    <span><?php esc_html_e('Stop Vertical Scrolling:', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Stop scrolling effect when submitting the form.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Redirect To:', 'metform'); ?></label>
                                <input type="text" name="redirect_to" class="mf-form-modalinput-redirect_to attr-form-control" placeholder="<?php esc_html_e('Redirection link', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Users will be redirected to the this link after submission.', 'metform'); ?></span>
                            </div>


                        </div>

                    </div>
                    <div role="tabpanel" class="attr-tab-pane" id="mf-confirmation">

                        <div class="attr-modal-body" id="metform_form_modal_body">

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="enable_user_notification" class="mf-admin-control-input mf-form-user-enable">
                                    <span><?php esc_html_e('Confirmation mail to user :', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Want to send a submission copy to user by email? Active this one.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required.', 'metform'); ?></strong></span>
                            </div>

                            <div class="mf-input-group mf-form-user-confirmation">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Subject:', 'metform'); ?></label>
                                <input type="text" name="user_email_subject" class="mf-form-user-email-subject attr-form-control" placeholder="<?php esc_html_e('Email subject', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter here email subject.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-user-confirmation">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email From:', 'metform'); ?></label>
                                <input type="email" name="user_email_from" class="mf-form-user-email-from attr-form-control" placeholder="<?php esc_html_e('From email', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter the email by which you want to send email to user.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-user-confirmation">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Reply To:', 'metform'); ?></label>
                                <input type="email" name="user_email_reply_to" class="mf-form-user-reply-to attr-form-control" placeholder="<?php esc_html_e('Reply to email', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter email where user can reply/ you want to get reply.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-user-confirmation">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Thank you message :', 'metform'); ?></label>
                                <textarea name="user_email_body" id="" class="mf-form-user-email-body attr-form-control" cols="30" rows="5" placeholder="<?php esc_html_e('Thank you message!', 'metform'); ?>"></textarea>
                                <span class='mf-input-help'><?php esc_html_e('Enter here your message to include it in email body. Which will be send to user.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-user-confirmation">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="user_email_attach_submission_copy" class="mf-admin-control-input mf-form-user-submission-copy">
                                    <span><?php esc_html_e('Want to send a copy of submitted form to user ?', 'metform'); ?></span>
                                </label>
                            </div>

                            <?php do_action('get_metform_email_verification_settings') ?>
                        </div>

                    </div>
                    <div role="tabpanel" class="attr-tab-pane" id="mf-notification">

                        <div class="attr-modal-body" id="metform_form_modal_body">

                            <div class="mf-input-group">
                                <label class="attr-input-label">
                                    <input type="checkbox" value="1" name="enable_admin_notification" class="mf-admin-control-input mf-form-admin-enable">
                                    <span><?php esc_html_e('Notification mail to admin :', 'metform'); ?></span>
                                </label>
                                <span class='mf-input-help'><?php esc_html_e('Want to send a submission copy to admin by email? Active this one.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-admin-notification">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Subject:', 'metform'); ?></label>
                                <input type="text" name="admin_email_subject" class="mf-form-admin-email-subject attr-form-control" placeholder="<?php esc_html_e('Email subject', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter here email subject.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-admin-notification">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email To:', 'metform'); ?></label>
                                <input type="text" name="admin_email_to" class="mf-form-admin-email-to attr-form-control" placeholder="<?php esc_html_e('example@mail.com, example@email.com', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter admin email where you want to send mail.', 'metform'); ?><strong><?php esc_html_e(' for multiple email addresses please use "," separator.', 'metform'); ?></strong></span>
                            </div>

                            <div class="mf-input-group mf-form-admin-notification">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email From:', 'metform'); ?></label>
                                <input type="text" name="admin_email_from" class="mf-form-admin-email-from attr-form-control" placeholder="<?php esc_html_e('Email from', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter the email by which you want to send email to admin.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-admin-notification">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Email Reply To:', 'metform'); ?></label>
                                <input type="text" name="admin_email_reply_to" class="mf-form-admin-reply-to attr-form-control" placeholder="<?php esc_html_e('Email reply to', 'metform'); ?>">
                                <span class='mf-input-help'><?php esc_html_e('Enter email where admin can reply/ you want to get reply.', 'metform'); ?></span>
                            </div>

                            <div class="mf-input-group mf-form-admin-notification">
                                <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Admin Note : ', 'metform'); ?></label>
                                <textarea name="admin_email_body" class="mf-form-admin-email-body attr-form-control" cols="30" rows="5" placeholder="<?php esc_html_e('Admin note!', 'metform'); ?>"></textarea>
                                <span class='mf-input-help'><?php esc_html_e('Enter here your email body. Which will be send to admin.', 'metform'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="attr-tab-pane" id="mf-integration">

                        <div class="attr-modal-body" id="metform_form_modal_body">

                        <div class="mf-input-group">

                            <label class="attr-input-label">
                                <input type="checkbox" value="1" name="mf_hubspot_forms" class="mf-admin-control-input mf-hubspot-forms">
                                <span><?php esc_html_e('HubSpot Forms:', 'metform'); ?></span>
                            </label>
                            <span class='mf-input-help'><?php esc_html_e('Integrate hubspot with this form. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf_crm'; ?>"><?php esc_html_e('Configure HubSpot.', 'metform'); ?></a></span>


                            <div class="hubspot_forms_section">

                                <label class="attr-input-label">

                                        <span><?php esc_html_e('Fetch HubSpot Forms', 'metform'); ?><span class="dashicons dashicons-update metfrom-btn-refresh-hubsopt-list"></span></span>
                                    </label>

                                    <select name='hubspot_forms' class="attr-form-control hubspot_forms">

                                    </select>

                                    <input type="hidden" class="mf_hubspot_form_guid" name="mf_hubspot_form_guid">
                                    <input type="hidden" class="mf_hubspot_form_portalId" name="mf_hubspot_form_portalId">

                                    <div id="mf-hubsopt-fileds"></div>

                                </div>


                            </div>

                            <div class="mf-input-group">
                            <label class="attr-input-label">
                                <input type="checkbox" value="1" name="mf_hubspot" class="mf-admin-control-input mf-hubsopt">
                                <span><?php esc_html_e('HubSpot Contact:', 'metform'); ?></span>
                            </label>
                            </div>

                            <?php if (class_exists('MetForm_Pro\Core\Integrations\Rest_Api')) : ?>
                                <div class="mf-input-group mf-input-group-inner">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_rest_api" class="mf-admin-control-input mf-form-modalinput-rest_api">
                                        <span><?php esc_html_e('REST API:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Send entry data to third party api/webhook', 'metform'); ?></span>
                                </div>

                                <div class="mf-input-group mf-input-rest-api-group">
                                    <div class="mf-rest-api">
                                        <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('URL/Webhook:', 'metform'); ?></label>
                                        <input type="text" name="mf_rest_api_url" class="mf-rest-api-url attr-form-control" placeholder="<?php esc_html_e('Rest api url/webhook', 'metform'); ?>">
                                        <span class='mf-input-help'><?php esc_html_e('Enter rest api url/webhook here.', 'metform'); ?></span>
                                    </div>
                                    <div class="mf-rest-api-key">
                                        <div id='rest_api_method'>
                                            <select name="mf_rest_api_method" class="mf-rest-api-method attr-form-control">
                                                <option value="POST"><?php esc_html_e('POST', 'metform'); ?></option>
                                                <option value="GET"><?php esc_html_e('GET', 'metform'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            <?php endif ?>

                            <?php if (class_exists('\MetForm\Core\Integrations\Mail_Chimp')) : ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_mail_chimp" class="mf-admin-control-input mf-form-modalinput-mail_chimp">
                                        <span><?php esc_html_e('Mail Chimp:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate mailchimp with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>"><?php esc_html_e('Configure Mail Chimp.', 'metform'); ?></a></strong></span>
                                </div>

                                <div class="mf-input-group mf-mailchimp">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('MailChimp List ID:', 'metform'); ?>
                                        <span class="dashicons dashicons-update metfrom-btn-refresh-mailchimp-list"></span></label>

                                    <select class="attr-form-control mailchimp_list">

                                    </select>

                                    <input type="hidden" name="mf_mailchimp_list_id" class="mf-mailchimp-list-id attr-form-control" placeholder="<?php esc_html_e('Mailchimp contact list id', 'metform'); ?>">

                                </div>

                            <?php endif ?>

                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Google_Sheet\WF_Google_Sheet')) : ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_google_sheet" class="mf-admin-control-input mf-form-modal_input-google_sheet">
                                        <span><?php esc_html_e('Google Sheet:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate google sheet with this form.', 'metform'); ?><strong><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-google_sheet_integration'; ?>"><?php esc_html_e('Configure Google Sheet.', 'metform'); ?></a></strong></span>
                                </div>
                            <?php endif; ?>

                            <?php if (did_action('xpd_metform_pro/plugin_loaded')) :

                                if (class_exists('\MetForm_Pro\Core\Integrations\Mail_Poet')) : ?>

                                    <div class="mf-input-group">
                                        <label class="attr-input-label">
                                            <input type="checkbox" value="1" name="mf_mail_poet" class="mf-admin-control-input mf-form-modalinput-mail_poet">
                                            <span><?php esc_html_e('MailPoet:', 'metform'); ?></span>
                                        </label>
                                        <span class='mf-input-help'>
                                            <?php esc_html_e('Integrate MailPoet with this form.', 'metform'); ?>
                                            <strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?>
                                                <a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>">
                                                    <?php esc_html_e('Configure MailPoet.', 'metform'); ?>
                                                </a>
                                            </strong>
                                        </span>
                                    </div>

                                    <div class="mf-input-group mf-mail-poet">
                                        <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('MailPoet List ID:', 'metform'); ?></label>

                                        <select name="mf_mail_poet_list_id" class="mf-mail-poet-list-id attr-form-control">
                                            <option value=""> None</option>
                                        </select>

                                        <span class='mf-input-help'><?php esc_html_e('Enter here MailPoet list id. ', 'metform'); ?>
                                            <a id="met_form_mail_poet_get_list" href="#"><?php esc_html_e('Refresh List', 'metform'); ?></a>
                                            <span id="mf_mail_poet_info"></span>
                                        </span>
                                    </div>


                                <?php endif; ?>

                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_mail_aweber" class="mf-admin-control-input mf-form-modalinput-mail_aweber">
                                        <span><?php esc_html_e('Aweber:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate aweber with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>"><?php esc_html_e('Configure aweber.', 'metform'); ?></a></strong></span>
                                </div>

                                <div class="mf-input-group mf-aweber">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Aweber List ID:', 'metform'); ?></label>

                                    <select name="mf_aweber_list_id" class="mf-aweber-list-id attr-form-control">
                                        <option class="mf_aweber_default_option" value=""> None</option>
                                    </select>

                                    <span class='mf-input-help'><?php esc_html_e('Enter here aweber list id. ', 'metform'); ?>
                                        <a id="met_form_aweber_get_list" href="#"><?php esc_html_e('Refresh List', 'metform'); ?></a>
                                        <span id="mf_aweber_info"></span>
                                    </span>

                                    <div id="mf-aweber-fields"></div>
                                </div>


                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_convert_kit" class="mf-admin-control-input mf-form-modalinput-ckit" />
                                        <span><?php esc_html_e('ConvertKit:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate convertKit with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>"><?php esc_html_e('Configure ConvertKit.', 'metform'); ?></a></strong></span>
                                </div>

                                <div class="mf-input-group mf-ckit">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('ConvertKit Forms ID:', 'metform'); ?></label>

                                    <select name="mf_ckit_list_id" class="attr-form-control mf-ckit-list-id">
                                        <option value=""> None</option>
                                    </select>

                                    <span class='mf-input-help'><?php esc_html_e('Enter here ConvertKit form id. ', 'metform'); ?>
                                        <a id="met_form_ckit_get_list" href="#">
                                            <?php esc_html_e('Refresh List', 'metform'); ?>
                                        </a>
                                    </span>
                                </div>


                            <?php endif ?>

                            <?php do_action('get_automixy_settings_content'); ?>


                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Email\Getresponse\Get_Response')) : ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_get_response" class="mf-admin-control-input mf-form-modalinput-get_response">
                                        <span><?php esc_html_e('GetResponse:', 'metform'); ?></span>
                                    </label>

                                    <span class='mf-input-help'><?php esc_html_e('Integrate GetResponse with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>"><?php esc_html_e('Configure GetResponse.', 'metform'); ?></a></strong></span>

                                </div>


                                <div class="mf-input-group mf-get_response">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('GetResponse List ID:', 'metform'); ?>
                                        <span class="dashicons dashicons-update metfrom-btn-refresh-get-response-list"></span></label>


                                    <select class="attr-form-control get-response-campaign-list">

                                    </select>

                                    <input type="hidden" name="mf_get_response_list_id" class="mf-get_response-list-id attr-form-control" placeholder="<?php esc_html_e('GetResponse contact list id', 'metform'); ?>">
                                    <span class='mf-input-help'><?php esc_html_e('Enter here GetResponse list id. ', 'metform'); ?></span>
                                </div>

                            <?php endif; ?>


                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Email\Activecampaign\Active_Campaign')) : ?>

                                <?php

                                $cached_email_list = get_option(\MetForm_Pro\Core\Integrations\Email\Activecampaign\Active_Campaign::CK_ACT_CAMP_EMAIL_LIST_CACHE_KEY, []);
                                $cached_tag_list = get_option(\MetForm_Pro\Core\Integrations\Email\Activecampaign\Active_Campaign::CK_ACT_CAMP_TAG_LIST_CACHE_KEY, []);

                                ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_active_campaign" class="mf-admin-control-input  mf-active-campaign">
                                        <span><?php esc_html_e('ActiveCampaign:', 'metform'); ?></span>
                                    </label>

                                    <span class='mf-input-help'><?php esc_html_e('Integrate ActiveCampaign with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-newsletter_integration'; ?>"><?php esc_html_e('Configure ActiveCampaign.', 'metform'); ?></a></strong></span>
                                </div>

                                <div class="mf-input-group mf-active-campaign">
                                    <label for="attr-input-label" class="attr-input-label">
                                        <?php esc_html_e('Active campaign List ID:', 'metform'); ?>
                                    </label>

                                    <select name="mf_active_campaign_list_id" class="mf-active-camp-list-id attr-form-control">
                                        <?php

                                        if (!empty($cached_email_list)) {

                                            foreach ($cached_email_list as $item) {

                                                echo '<option value="' . esc_html($item['sid']) . '">' . esc_html($item['name']) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                    <span class='mf-input-help'><?php esc_html_e('Enter here list id. ', 'metform'); ?>
                                        <a id="met_form_act_camp_get_list" href="#"><?php esc_html_e('Refresh List', 'metform'); ?></a>
                                        <span id="mf_act_camp_info"> </span>
                                    </span>
                                </div>

                                <div class="mf-input-group mf-active-campaign">

                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Active campaign Tag ID:', 'metform'); ?></label>

                                    <select name="mf_active_campaign_tag_id" class="mf-active-camp-list-id attr-form-control">
                                        <option value=""> None </option>
                                        <?php

                                        if (!empty($cached_tag_list)) {

                                            foreach ($cached_tag_list as $item) {

                                                echo '<option value="' . esc_html($item['sid']) . '">' . esc_html($item['name']) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                    <span class='mf-input-help'><?php esc_html_e('Enter here tag id. ', 'metform'); ?>
                                        <a id="met_form_act_camp_get_tags" href="#"><?php esc_html_e('Refresh List', 'metform'); ?></a>
                                        <span id="mf_act_camp_tag_info"> </span>
                                    </span>
                                </div>



                            <?php endif ?>


                            <?php
                            if (function_exists('mailster')) {
                                if (class_exists('\MetForm_Pro\Core\Integrations\Email\Mailster\Mailster')) :
                            ?>
                                    <div class="mf-input-group">

                                        <label class="attr-input-label">
                                            <input type="checkbox" value="1" name="mf_mailster" class="mf-admin-control-input mf-form-modalinput-mailster">
                                            <span><?php esc_html_e('Mailster:', 'metform'); ?></span>
                                        </label>

                                        <span class='mf-input-help'><?php esc_html_e('Integrate Mailster with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required. ', 'metform'); ?></strong></span>

                                    </div>


                                    <div class="mf-input-group mf-mailster-forms">
                                        <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Mailster Forms', 'metform'); ?></label>

                                        <select name="mf_mailster_list_id" class="mf-mailster-list-id attr-form-control">

                                            <?php

                                            $forms = mailster('forms')->get();
                                            foreach ($forms as $form) :
                                            ?>
                                                <option value="<?php esc_html_e($form->ID, 'metform'); ?>"><?php esc_html_e($form->name, 'metform'); ?></option>
                                            <?php
                                            endforeach;

                                            ?>
                                        </select>
                                    </div>
                                    <div class="mf-input-group mf-mailster-settings-section">


                                    </div>

                            <?php
                                endif;
                            }
                            ?>



                            <?php if (class_exists('\MetForm_Pro\Core\Integrations\Zapier')) : ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_zapier" class="mf-admin-control-input mf-form-modalinput-zapier">
                                        <span><?php esc_html_e('Zapier:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate zapier with this form.', 'metform'); ?><strong><?php esc_html_e('The form must have at least one Email widget and it should be required.', 'metform'); ?></strong></span>
                                </div>

                                <div class="mf-input-group mf-zapier">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Zapier webhook:', 'metform'); ?></label>
                                    <input type="text" name="mf_zapier_webhook" class="mf-zapier-web-hook attr-form-control" placeholder="<?php esc_html_e('Zapier webhook', 'metform'); ?>">
                                    <span class='mf-input-help'><?php esc_html_e('Enter here zapier web hook.', 'metform'); ?></span>
                                </div>

                            <?php endif ?>

                            <?php if (class_exists('\MetForm\Core\Integrations\Slack')) : ?>
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_slack" class="mf-admin-control-input mf-form-modalinput-slack">
                                        <span><?php esc_html_e('Slack:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate slack with this form.', 'metform'); ?><strong><?php esc_html_e('slack info.', 'metform'); ?></strong></span>
                                </div>

                                <div class="mf-input-group mf-slack">
                                    <label for="attr-input-label" class="attr-input-label"><?php esc_html_e('Slack webhook:', 'metform'); ?></label>
                                    <input type="text" name="mf_slack_webhook" class="mf-slack-web-hook attr-form-control" placeholder="<?php esc_html_e('Slack webhook', 'metform'); ?>">
                                    <span class='mf-input-help'><?php esc_html_e('Enter here slack web hook.', 'metform'); ?><a href="http://slack.com/apps/A0F7XDUAZ-incoming-webhooks"><?php esc_html_e('create from here', 'metform'); ?></a></span>
                                </div>

                            <?php endif ?>

                            <?php do_action('metform_sms_integration_editor_markup') ?>

                        </div>

                    </div>

                    <?php if (class_exists('MetForm_Pro\Base\Package')) : ?>
                        <div role="tabpanel" class="attr-tab-pane" id="mf-payment">
                            <div class="attr-modal-body" id="metform_form_modal_body">
                                <?php
                                $currencies = [
                                    'AUD' => 'Australian dollar',
                                    'BRL' => 'Brazilian real',
                                    'CAD' => 'Canadian dollar',
                                    'CNY' => 'Chinese Renmenbi',
                                    'CZK' => 'Czech koruna',
                                    'DKK' => 'Danish krone',
                                    'EUR' => 'Euro',
                                    'HKD' => 'Hong Kong dollar',
                                    'HUF' => 'Hungarian forint',
                                    'ILS' => 'Israeli new shekel',
                                    'JPY' => 'Japanese yen',
                                    'MYR' => 'Malaysian ringgit',
                                    'MXN' => 'Mexican peso',
                                    'TWD' => 'New Taiwan dollar',
                                    'NZD' => 'New Zealand dollar',
                                    'NOK' => 'Norwegian krone',
                                    'PHP' => 'Philippine peso',
                                    'PLN' => 'Polish złoty',
                                    'GBP' => 'Pound sterling',
                                    'RUB' => 'Russian ruble',
                                    'SGD' => 'Singapore dollar',
                                    'SEK' => 'Swedish krona',
                                    'CHF' => 'Swiss franc',
                                    'THB' => 'Thai baht',
                                    'USD' => 'United States dollar',
                                ]

                                ?>

                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        Default currency
                                    </label>
                                    <select name="mf_payment_currency" id="" class="mf_payment_currency attr-form-control">
                                        <?php foreach ($currencies as $key => $value) { ?>
                                            <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($key == 'USD' ? 'selected' : ''); ?>><?php echo esc_html($value) . ' (' . esc_html($key) . ')' ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Paypal')) : ?>
                                    <div class="mf-input-group">
                                        <label class="attr-input-label">
                                            <input type="checkbox" value="1" name="mf_paypal" class="mf-admin-control-input mf-form-modalinput-paypal">
                                            <span><?php esc_html_e('Paypal:', 'metform'); ?></span>
                                        </label>
                                        <span class='mf-input-help'><?php esc_html_e('Integrate paypal payment with this form.', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-payment_options'; ?>"><?php esc_html_e('Configure paypal payment.', 'metform'); ?></a></span>
                                    </div>
                                <?php endif ?>


                                <?php if (class_exists('\MetForm_Pro\Core\Integrations\Payment\Stripe')) : ?>
                                    <div class="mf-input-group">
                                        <label class="attr-input-label">
                                            <input type="checkbox" value="1" name="mf_stripe" class="mf-admin-control-input mf-form-modalinput-stripe">
                                            <span><?php esc_html_e('Stripe:', 'metform'); ?></span>
                                        </label>
                                        <span class='mf-input-help'><?php esc_html_e('Integrate stripe payment with this form. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf-payment_options'; ?>"><?php esc_html_e('Configure stripe payment.', 'metform'); ?></a></span>
                                    </div>
                                <?php endif ?>


                            </div>

                        </div>
                    <?php endif; ?>


                        <div role="tabpanel" class="attr-tab-pane" id="mf-crm">

                            <div class="attr-modal-body" id="metform_form_modal_body">

                                <?php if (class_exists('\MetForm_Pro\Core\Integrations\Crm\Zoho\Integration')) : ?>
                                <!-- Zoho integration  -->
                                <div class="mf-input-group">
                                    <label class="attr-input-label">
                                        <input type="checkbox" value="1" name="mf_zoho" class="mf-admin-control-input mf-zoho">
                                        <span><?php esc_html_e('Zoho Contact:', 'metform'); ?></span>
                                    </label>
                                    <span class='mf-input-help'><?php esc_html_e('Integrate Zoho contacts with this form. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf_crm'; ?>"><?php esc_html_e('Configure Zoho.', 'metform'); ?></a></span>
                                </div>
                                <?php endif; ?>

                                <!-- Helpscout integration -->

                                <?php if (class_exists('\MetForm_Pro\Core\Integrations\Crm\Helpscout\Helpscout')) : ?>

                                    <div class="mf-input-group">
                                        <label class="attr-input-label">
                                            <input type="checkbox" value="1" name="mf_helpscout" class="mf-admin-control-input mf-helpscout">
                                            <span><?php esc_html_e('Helpscout', 'metform'); ?></span>
                                        </label>
                                        <span class='mf-input-help'><?php esc_html_e('Integrate Helpscout with this form. ', 'metform'); ?><a target="_blank" href="<?php echo esc_url(get_dashboard_url()) . 'admin.php?page=metform-menu-settings#mf_crm'; ?>"><?php esc_html_e('Configure Helpscout.', 'metform'); ?></a></span>

                                        <div style="display: none;" class="helpscout_forms_section">

                                            <label class="attr-input-label">
                                                <span><?php esc_html_e('Available Mailboxes', 'metform'); ?></span>
                                            </label>

                                            <?php if (get_option('mf_helpscout_mailboxes') && is_array(get_option('mf_helpscout_mailboxes'))) : ?>
                                                <select id="mf_helpscout_mailbox" name='mf_helpscout_mailbox' class="attr-form-control helpscout_mailboxes">
                                                    <?php foreach (get_option('mf_helpscout_mailboxes') as $mailbox) : ?>
                                                        <option value="<?php echo esc_html($mailbox['id'], 'metform') ?>"><?php echo esc_html($mailbox['name'], 'metform') ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            <?php else : ?>
                                                <span>No mailbox found</span>
                                            <?php endif; ?>


                                            <br><br>

                                            <div id="mf-helpscout-fileds"></div>

                                        </div>


                                    </div>

                                <?php endif; ?>

                                <?php do_action('metform_fluent_crm_editor_markup') ?>

                            </div>

                        </div>

                    <?php do_action('mf_form_settings_tab_content'); ?>


                </div>

                <div class="attr-modal-footer">
                    <button type="button" class="attr-btn attr-btn-default metform-form-save-btn-editor"><img class="form-editor-icon" src="<?php echo esc_url(\MetForm\Plugin::instance()->public_url()) . 'assets/img/elementor-edit-logo.png'; ?>"><?php esc_html_e('Edit content', 'metform'); ?>
                    </button>
                    <button type="submit" class="attr-btn attr-btn-primary metform-form-save-btn"><?php esc_html_e('Save changes', 'metform'); ?></button>
                </div>

                <div class="mf-spinner"></div>
            </div>
        </form>
    </div>
</div>