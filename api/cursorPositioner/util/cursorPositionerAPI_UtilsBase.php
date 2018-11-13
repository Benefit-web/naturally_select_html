<?php
/**
 * ユーティリティクラス
 *
 * 主に static 参照するユーティリティ系の関数群
 *
 */
class cursorPositionerAPI_UtilsBase
{

    /**
     * ＡＰＩコール
     *
     */
    public static function RunAPI($arrParm)
    {
        if(empty($arrParm)){
            return false;
        }
        // パラメータをログに出力
        self::writeLog($arrParm, true);
    }

    /**
     * ログ書込み
     */
    public static function writeLog($arrParm)
    {
      // ログ出力パス
      $path = '/tmp/cursorPositionerAPI/logs/cursor_api.log';
      // 日付の取得
      $today = date('Y/m/d H:i:s');
      // パラメータを整形
      $out_put = "";
      foreach($arrParm as $key => $val){
        if(empty($val)){
          $val = "empty";
        }
        $out_put .= "[" .$key. "] => " . $val . ", ";
      }

      $msg = "$today [{$_SERVER['SCRIPT_NAME']}] $out_put from {$_SERVER['REMOTE_ADDR']}\n";
      // 追加書き込み
      error_log($msg, 3, $path);
    }
}
