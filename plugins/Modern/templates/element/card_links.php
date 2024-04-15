<div class="links d-flex justify-content-between flex-wrap">

<?php 
	foreach ($links as $key => $link) {

        switch ($link->type_id) {
            case 1:
                // phone
                $phone = $link->content;
                echo "<div class=''>
                    <a  class='contact-link' href='tel:{$phone}'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 2:
                // email
                $email = $link->content;
                echo "<div class=''>
                    <a  class='contact-link' href='mailto:{$email}'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 3:
                // whatsapp
                $whatsapp = $link->content;
                echo "<div class=''>
                    <a  class='contact-link' href='https://wa.me/{$whatsapp}'
                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 4:
                // VCARD
                $vcard = $this->Url->assetUrl('contacts/'.$link->content);
                echo "<div class=''>
                    <a  class='contact-link' href='{$vcard}'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 5:
                // instagram
                $instagram = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$instagram}'
                                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 6:
                // Tiktok
                $tiktok = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$tiktok}'
                                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 9:
                // Linkedin
                $Linkedin = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$Linkedin}'
                                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 10:
                // Behance
                $Behance = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$Behance}'
                                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;

            case 11:
                // location
                $location = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$location}'
                                    target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;
            
            default:
                // General link
                $other = $link->url;
                echo "<div class=''>
                    <a  class='contact-link' href='{$other}'
                            target='_blank' rel='nofolow'>
                        {$link->link_type->icon}<br>
                        {$link->title} 
                    </a>    
                </div>"; 
                break;
        }

	}
 ?>

</div> <!-- ./links -->