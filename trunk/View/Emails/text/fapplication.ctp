<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

下記内容にて、お客様からのお申込・お問合せを受け付けました。

登録内容に従って、数日以内にお客様へのお申込・お問合せの回答をご連絡ください。

申込みツアー：<?php echo $tourname; ?>

氏名：<?php echo $name; ?> 

メールアドレス：<?php echo $email; ?> 

電話番号:<?php echo $phone_number; ?> 

都道府県:<?php echo $name; ?> 

年齢:<?php echo $age; ?> 

利用希望日:<?php echo $applied_date; ?> 

参加予定人数:
大人：<?php echo $number_of_applicants; ?>  子供：<?php echo $number_kids; ?> 

内容:
<?php echo $content; ?> 

------------------------------------------
ニッポン全国「ココでしかできない！」体験プログラムやツアーの情報検索サイト
My Activity -マイ・アクティビティ−

http://myactivity.jp

運営：株式会社エフネス
Mail：myactivity@f-ness.com
