<?php
function cd_import_export(){
    ?>
    <div class="wrap">
        <?php
        $page = $_GET['page'];
        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        }

        ?>

        <!-- Display Plugin Icon, Header, and Description -->
		<h1><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '/images/cdash-32.png'?>"><?php _e('Chamber Dashboard Import/Export', 'cdash'); ?></h1>

        <div id="main" class="cd_settings_tab_group" style="width: 100%; float: left;">
            <!--<div class=" cdash section_group">
                <ul>
                    <li class="<?php echo $section == 'bus_import' ? 'section_active' : ''; ?>">
                        <a href="?page=cd-settings&tab=import_export&section=bus_import" class="<?php echo $section == 'bus_import' ? 'section_active' : ''; ?>"><?php esc_html_e( 'Import Business Listings', 'cdash' ); ?></a><span>|</span>
                    </li>
                    <li class="<?php echo $section == 'export' ? 'section_active' : ''; ?>">
                        <a href="?page=cd-settings&tab=import_export&section=export" class="<?php echo $section == 'export' ? 'section_active' : ''; ?>"><?php esc_html_e( 'Export Data', 'cdash' ); ?></a>
                    </li>
                </ul><br />
            </div>-->
            <div class="cdash_section_content cd_settings">
                <div class="settings_sections">
                    <?php cdash_export_form(); ?>
                    <?php cdash_import_form(); ?>
                </div>
                <?php
                /*if( $section == 'export' ){
                    //cdash_export_form();
                }else if($section == 'bus_import'){
                    //cdash_import_form();
                }*/
              ?>
            </div>
        </div>
    </div>
<?php
}
?>
