 <?php

        $f="Tax-Compliance-Certificate.pdf";   

               $file = ("http://www.wean.epizy.com/wp-content/uploads/2020/08/$f");

                      $filetype=filetype($file);

                             $filename=basename($file);

                                    header ("Content-Type: ".$filetype);

                                           header ("Content-Length: ".filesize($file));

                                                  header ("Content-Disposition: attachment; filename=".$filename);

                                                         readfile($file);

                                                           ?>
                                                           
