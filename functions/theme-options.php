<?php

// Theme Options

// Theme Name : TG-Linen

$themename = "TG-Linen";

$shortname = "xx";

$version = "1.0";



// Create theme options

global $options;

$options = array(



  //Home Page Banner

  array(
    "name" => "Home Page Banner",

    "type" => "section"
  ),

  array("type" => "open"),



  /** Slider 1 **/

  array(
    "name" => "Image1",

    "desc" => "Upload image for Home Page Banner Image",

    "id" => $shortname . "_image1",

    "std" => "",

    "type" => "upload"
  ),





  array(
    "name" => "Heading1",

    "desc" => "Enter a Text for Home Page Heading",

    "id" => $shortname . "_heading1",

    "std" => "",

    "type" => "text"
  ),





  array(
    "name" => "Paragraph1",

    "desc" => "Enter a Text for Home Page Paragraph",

    "id" => $shortname . "_paragraph1",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Content1",

    "desc" => "Enter a Text for Home Page Content",

    "id" => $shortname . "_content1",

    "std" => "",

    "type" => "text"
  ),


  /** Slider 2 **/
  array(
    "name" => "Image2",
    "desc" => "Upload image for Home Page Banner Image 2",
    "id" => $shortname . "_image2",
    "std" => "",
    "type" => "upload"
  ),


  array(
    "name" => "Heading2",
    "desc" => "Enter a Text for Home Page Heading 2",
    "id" => $shortname . "_heading2",
    "std" => "",
    "type" => "text"
  ),


  array(
    "name" => "Paragraph2",
    "desc" => "Enter a Text for Home Page Paragraph 2",
    "id" => $shortname . "_paragraph2",
    "std" => "",
    "type" => "text"
  ),


  /** Slider 3 **/
  array(
    "name" => "Image3",
    "desc" => "Upload image for Home Page Banner Image 3",
    "id" => $shortname . "_image3",
    "std" => "",
    "type" => "upload"
  ),


  array(
    "name" => "Heading3",
    "desc" => "Enter a Text for Home Page Heading 3",
    "id" => $shortname . "_heading3",
    "std" => "",
    "type" => "text"
  ),


  array(
    "name" => "Paragraph3",
    "desc" => "Enter a Text for Home Page Paragraph 3",
    "id" => $shortname . "_paragraph3",
    "std" => "",
    "type" => "text"
  ),


  /** Slider 4 **/
  array(
    "name" => "Image4",
    "desc" => "Upload image for Home Page Banner Image 4",
    "id" => $shortname . "_image4",
    "std" => "",
    "type" => "upload"
  ),


  array(
    "name" => "Heading4",
    "desc" => "Enter a Text for Home Page Heading 4",
    "id" => $shortname . "_heading4",
    "std" => "",
    "type" => "text"
  ),


  array(
    "name" => "Paragraph4",
    "desc" => "Enter a Text for Home Page Paragraph 4",
    "id" => $shortname . "_paragraph4",
    "std" => "",
    "type" => "text"
  ),



  array("type" => "close"),




  //Social Media Links

  array(
    "name" => "Social Media Link Settings",

    "type" => "section"
  ),



  array(
    "name" => "Facebook Profile Link",

    "desc" => "Enter Facebook Profile Link",

    "id" => $shortname . "_fb",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Youtube Link Settings",

    "desc" => "Enter Youtube Profile Link",

    "id" => $shortname . "_yt",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Instagram Link Settings",

    "desc" => "Enter Instagram Profile Link",

    "id" => $shortname . "_inst",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Linkedin Link Settings",

    "desc" => "Enter Linkedin Profile Link",

    "id" => $shortname . "_lk",

    "std" => "",

    "type" => "text"
  ),





  array("type" => "close"),





  //Our Footer Section

  array(
    "name" => "Footer",

    "type" => "section"
  ),



  array("type" => "open"),





  array(
    "name" => "Address",

    "desc" => "Enter location Address Kuta",

    "id" => $shortname . "_ad1",

    "std" => "",

    "type" => "text"
  ),

  // 					array( "name" => "Address Ubud",

  // 					"desc" => "Enter location Address Ubud",

  // 					"id" => $shortname."_ad2",

  // 					"std" => "",

  // 					"type" => "text"),



  // 					array( "name" => "Address Jakarta",

  // 					"desc" => "Enter location Address Jakarta",

  // 					"id" => $shortname."_ad3",

  // 					"std" => "",

  // 					"type" => "text"),



  array(
    "name" => "Phone Number1",

    "desc" => "Enter Phone Number1",

    "id" => $shortname . "_ph1",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Email",

    "desc" => "Enter email",

    "id" => $shortname . "_eml",

    "std" => "",

    "type" => "text"
  ),



  array(
    "name" => "Timing",

    "desc" => "Enter timimg",

    "id" => $shortname . "_tm",

    "std" => "",

    "type" => "text"
  ),


  array(
    "name" => "Footerimg",

    "desc" => "Upload image for Footer Img Banner Image",

    "id" => $shortname . "_footer1",

    "std" => "",

    "type" => "upload"
  ),





  array("type" => "close"),



);



function p2h_add_admin()
{



  global $themename, $shortname, $options;



  if (isset($_GET['page']) && ($_GET['page'] == basename(__FILE__))) {



    if (isset($_REQUEST['action']) && ('save' == $_REQUEST['action'])) {



      foreach ($options as $value) {

        if (array_key_exists('id', $value)) {



          if (isset($_REQUEST[$value['id']])) {

            update_option($value['id'], $_REQUEST[$value['id']]);
          } else {

            delete_option($value['id']);
          }





          if (!empty($_FILES['attachement_' . $value['id']]['name'])) {

            $src = $_FILES['attachement_' . $value['id']]['tmp_name'];

            $newname = date('Ymdhis') . "_" . $_FILES['attachement_' . $value['id']]['name'];

            $dest_path = get_image_phy_destination_path_user() . $newname;

            //$user_photo = image_resize_custom($src,$dest_path,1360,684);

            move_uploaded_file($src, $dest_path);

            //$photo_path = get_image_rel_destination_path_user().$user_photo['file'];

            $impath = get_image_rel_destination_path_user() . $newname;

            update_option($value['id'], $impath);
          }
        }
      }

      header("Location: admin.php?page=" . basename(__FILE__) . "&saved=true");
    } else if (isset($_REQUEST['action']) && ('reset' == $_REQUEST['action'])) {

      foreach ($options as $value) {

        if (array_key_exists('id', $value)) {

          delete_option($value['id']);
        }
      }

      header("Location: admin.php?page=" . basename(__FILE__) . "&reset=true");
    }
  }



  add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'p2h_admin');

  add_submenu_page(basename(__FILE__), $themename . ' Options', 'Theme Options', 'administrator',  basename(__FILE__), 'p2h_admin'); // Default

}



function p2h_add_init()
{



  $file_dir = get_bloginfo('template_directory');

  wp_enqueue_style("p2hCss", $file_dir . "/functions/theme-options.css");

  wp_enqueue_script("p2hScript", $file_dir . "/functions/theme-options.js");
}



function p2h_admin()
{



  global $themename, $shortname, $version, $options;

  $i = 0;



  if (isset($_REQUEST['saved']) && ($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' settings saved.</strong></p></div>';

  if (isset($_REQUEST['reset']) && ($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>' . $themename . ' settings reset.</strong></p></div>';



?>



  <div class="wrap ">

    <div class="options_wrap">

      <h2 class="settings-title"><?php echo $themename; ?> Settings</h2>

      <form method="post" enctype="multipart/form-data">

        <?php foreach ($options as $value) {

          switch ($value['type']) {

            case "section":

        ?>

              <div class="section_wrap">

                <h3 class="section_title"><?php echo $value['name']; ?></h3>

                <div class="section_body">

                <?php

                break;

              case "upload":

                ?>

                  <div class="options_input options_text">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <span class="labels">

                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                    </span>

                    <?php $myval = "attachement_" . $value['id']; ?>

                    <input type="file" name="<?php echo $myval; ?>" class="upload_input">

                    </input>

                    <span class="submit">

                      <input name="save" type="submit" value="Upload" class="button upload_save" />

                    </span>

                    <div class="clear"></div>

                    <input class="upload-input-text" name="<?php echo $value['id'] ?>" value="<?php echo get_option($value['id']) ?>" style="width:490px !important;" />

                    <div class="clear"></div>

                    <?php if (get_option($value['id'])) { ?>

                      <img src="<?php echo get_option($value['id']) ?>" alt="" width="500" height="200" />

                    <?php } ?>

                    <div class="clear"></div>

                  </div>

                <?php

                break;

              case 'text':

                ?>

                  <div class="options_input options_text">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <span class="labels">

                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                    </span>

                    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_option($value['id']) != "") {
                                                                                                                                              echo stripslashes(get_option($value['id']));
                                                                                                                                            } else {
                                                                                                                                              echo $value['std'];
                                                                                                                                            } ?>" />

                  </div>

                <?php

                break;

              case 'textarea':

                ?>

                  <div class="options_input options_textarea">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <span class="labels">

                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                    </span>

                    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if (get_option($value['id']) != "") {
                                                                                                                        echo stripslashes(get_option($value['id']));
                                                                                                                      } else {
                                                                                                                        echo $value['std'];
                                                                                                                      } ?>

</textarea>

                  </div>

                <?php

                break;

              case 'select':

                ?>

                  <div class="options_input options_select">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <span class="labels">

                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                    </span>

                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">

                      <?php foreach ($value['options'] as $option) { ?>

                        <option <?php if (get_option($value['id']) == $option) {
                                  echo 'selected="selected"';
                                } ?>><?php echo $option; ?></option>

                      <?php } ?>

                    </select>

                  </div>

                <?php

                break;

              case "radio":

                ?>

                  <div class="options_input options_select">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <span class="labels">

                      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                    </span>

                    <?php foreach ($value['options'] as $key => $option) {

                      $radio_setting = get_option($value['id']);

                      if ($radio_setting != '') {

                        if ($key == get_option($value['id'])) {

                          $checked = "checked";
                        } else {

                          $checked = "";
                        }
                      } else {

                        if ($key == $value['std']) {

                          $checked = "checked";
                        } else {

                          $checked = "";
                        }
                      } ?>

                      <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> />

                      <?php echo $option; ?><br />

                    <?php } ?>

                  </div>

                <?php

                break;

              case "checkbox":

                ?>

                  <div class="options_input options_checkbox">

                    <div class="options_desc"><?php echo $value['desc']; ?></div>

                    <?php if (get_option($value['id'])) {
                      $checked = "checked";
                    } else {
                      $checked = "";
                    } ?>

                    <input type="checkbox" name="<?php echo $value['id']; ?>2" id="<?php echo $value['id']; ?>2" value="true" <?php echo $checked; ?> />

                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

                  </div>

                <?php

                break;

              case "close":

                $i++;

                ?>

                  <span class="submit">

                    <input name="save<?php echo $i; ?>" type="submit" value="Save Changes" />

                  </span>
                </div>

                <!--#section_body-->

              </div>

              <!--#section_wrap-->



        <?php break;
            }
          }

        ?>

        <input type="hidden" name="action" value="save" />

        <span class="submit">

          <input name="save" type="submit" value="Save All Changes" />

        </span>

      </form>



      <!---<form method="post">

<span class="submit">

<input name="reset" type="submit" value="Reset All Options" />

<input type="hidden" name="action" value="reset" />

</span>

</form>-->

      <br />

    </div>

    <!--#options-wrap-->



  </div>

  <!--#wrap-->

<?php

}

add_action('admin_init', 'p2h_add_init');

add_action('admin_menu', 'p2h_add_admin');

?>