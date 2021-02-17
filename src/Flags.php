<?php

namespace Flags;

class Flags
{
  public static function get($country, $width = "64", $height = null)
  {
    if (file_exists(__DIR__."/database/svg/".$country.".svg")) {
      $read = file_get_contents(__DIR__."/database/svg/".$country.".svg");
      $return = mb_substr($read,0,179);
      $return .= "width=\"".$width."\"";
      if ($height != null) {
        $return .= " height=\"".$height."\" ";
      }else {
        $return .= " height=\"".($width / 1.5)."\" ";
      }
      $return .= mb_substr($read,180);
      $replace = [
        "id=\"Capa_1\"" => "id=\"".$country."-flag\" class=\"".$country."-flag\"",
        "<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->" => "",
        "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>" => "",
        "\n" => ""
      ];
      $return = str_replace(array_keys($replace), $replace, $return);
    }else {
      $return = false;
    }
    return $return;
  }
}