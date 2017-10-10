<?php

function formatUrl($url) {
  if  ( $ret = parse_url($url) ) {
    if ( !isset($ret["scheme"]) ) {
      return "http://{$url}";
    }
  }
  return $url;
}

function formatDateToDB($date) {
  $time = strtotime($date);
  return date('Y-m-d', $time);
}

function formatDateToScreen($date) {
  return date("j F Y", strtotime($date));
}

function IsNullOrEmptyString($question) {
    return (!isset($question) || trim($question)=== '');
}

?>