<?php

function build_article_image_fullpath($filename)
{
  global $PATH_ARTICLE_IMAGE;
  return $PATH_ARTICLE_IMAGE . $filename;
}

function mysqldate_tostring($mysql_datetime)
{
  try
  {
    return date_format(date_create($mysql_datetime),"D, d M Y");
  }
  catch (Exception $e)
  {
    return "N/A";
  }
}


function build_user_image_fullpath($filename)
{
  global $PATH_USER_IMAGE;
  return $PATH_USER_IMAGE . $filename;
}


?>