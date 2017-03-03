<?php
/* Extensions Page for Chamber Dashboard Business Directory */

if ( ! defined( 'ABSPATH' ) ) exit;

wp_enqueue_script( 'thickbox' );
wp_enqueue_style( 'thickbox' );
wp_enqueue_style( 'addons.css', plugins_url( 'includes/addons.css', __FILE__ ));

function display_addons($title, $slug, $description, $link, $price){
    $url = admin_url();
?>
    <li class="single_addon">                          
        <img src="<?php echo plugins_url( 'images/' . $slug . '.jpg' , __FILE__ ); ?>" />
        <h4><?php echo $price; ?></h4>
        <p><?php echo $description; ?></p>
        <?php
            if($price == 'Free'){
            ?>    
                <a href="<?php echo $link; ?>" class=" button-primary thickbox fs-overlay" aria-label="More information about <?php echo $title; ?>" data-title="<?php echo $title; ?>">Get this Addon</a>
            <?php
            }else{
            ?>    
                <a href="<?php echo $link; ?>" class=" button-primary" target="_blank">Get this Addon</a>
            <?php    
            }                                                                        
        ?>
    </li>
<?php
}

function chamber_dashboard_extensions_page_render(){
?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br></div>
        <h2><?php _e('Chamber Dashboard Addons'); ?></h2>
        <?php settings_errors(); ?>
        
        <div id="main" style="min-width: 350px; float: left;">
            <div id="addons_list">
                <ul>
                    <?php 
                        display_addons(
                            'Chamber Dashboard Member Manager',
                            'member_manager',
                            'Let Members join your organization right on your website!',
                            $url . 'plugin-install.php?tab=plugin-information&amp;parent_plugin_id=170&amp;plugin=chamber-dashboard-member-manager&amp;TB_iframe=true&amp;width=772&amp;height=700',
                            'Free'
                        );
                        
                        display_addons(
                            'Chamber Dashboard CRM',
                            'crm',
                            'Keep track of people in your organization.',
                            $url . 'plugin-install.php?tab=plugin-information&amp;parent_plugin_id=170&amp;plugin=chamber-dashboard-crm&amp;TB_iframe=true&amp;width=772&amp;height=700',
                            'Free'
                        );
                        
                        display_addons(                            
                            'Chamber Dashboard Recurring Payments',
                            'recurring_payments',
                            'Offer your members the recurring payments option and genereate invoices automatically.',
                            'https://chamberdashboard.com/downloads/recurring-payments/',
                            '$79.00'
                        );                            
                        
                        display_addons(                            
                            'Chamber Dashboard Exporter',
                            'exporter',
                            'Export member businesses, contacts, paid or unpaid invoices.',
                            'https://chamberdashboard.com/downloads/chamber-dashboard-exporter/',
                            '$39.00'
                        );
                                                    
                        display_addons(                            
                            'Chamber Dashboard Member Updater',
                            'member_updater',
                            'Let Members update their listings by logging in from the front end.',                        
                            'https://chamberdashboard.com/downloads/member-updater/',
                            '$79.00'
                        );
                        
                        display_addons(                            
                            'Chamber Dashboard CRM Importer',
                            'crm_importer',
                            'Import people associated with businesses.',                        
                            'https://chamberdashboard.com/downloads/crm-importer/',
                            '$39.00'
                        );
                            
                    ?>                                
                </ul>
            </div><!-- end of extensions_list-->
        </div><!-- end of main-->
    </div><!--end of wrap-->
<?php    
}

?>