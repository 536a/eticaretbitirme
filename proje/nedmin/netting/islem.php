<?php 

ob_start();
session_start();

include 'baglan.php';
include '../production/seofonksiyon.php';


if(isset($_POST['admingiris'])){


$kullanici_mail = $_POST['kullanici_mail'];
$kullanici_password = md5($_POST['kullanici_password']);

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and 
	kullanici_password=:password and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
  'mail' => $kullanici_mail,
  'password' => $kullanici_password,
  'yetki' => 5
));

$say = $kullanicisor -> rowCount();

if ($say == 1) {

	$_SESSION['kullanici_mail'] = $kullanici_mail;
	header("Location:../production/index.php");

} else {

	header("Location:../production/login/login.php?durum=no");	
}


}







if(isset($_POST['genelayarkaydet'])){

	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
		));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}







if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,		
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres']
		));


	if ($update) {

		header("Location:../production/iletisim-ayar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayar.php?durum=no");
	}
	
}






if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
		));


	if ($update) {

		header("Location:../production/api-ayar.php?durum=ok");

	} else {

		header("Location:../production/api-ayar.php?durum=no");
	}
	
}





if (isset($_POST['sosyalayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google,
		ayar_instagram=:ayar_instagram,
		ayar_twitter=:ayar_twitter
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_instagram' => $_POST['ayar_instagram'],
		'ayar_twitter'=>$_POST['ayar_twitter']
		));


	if ($update) {

		header("Location:../production/sosyal-ayar.php?durum=ok");

	} else {

		header("Location:../production/sosyal-ayar.php?durum=no");
	}
	
}






if (isset($_POST['mailayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtphost=:ayar_smtphost,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_smtpuser' => $_POST['ayar_smtpuser'],
		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport'=>$_POST['ayar_smtpport']
		));


	if ($update) {

		header("Location:../production/mail-ayar.php?durum=ok");

	} else {

		header("Location:../production/mail-ayar.php?durum=no");
	}
	
}





if (isset($_POST['hakkimizdaayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update){

		header("Location:../production/hakkimizda-ayar.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda-ayar.php?durum=no");
	}
	
}

if(isset($_POST['kullanicikaydet'])){

	$kullanici_id=$_POST['kullanici_id'];
	$kullanicikaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_gsm=:kullanici_gsm,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$kullanicikaydet->execute(array(		
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
	
}



if($_GET['kullanicisil']=="ok"){

	
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {

		header("Location:../production/kullanici.php?durum=ok");

	} else {

		header("Location:../production/kullanici.php?durum=no");
	}
	
}


if($_GET['menusil']=="ok"){

	
	$sil=$db->prepare("DELETE from menu where menu_id=:id");

	$kontrol=$sil->execute(array(		
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {

		header("Location:../production/menu.php?durum=ok");

	} else {

		header("Location:../production/menu.php?durum=no");
	}
	
}



if(isset($_POST['menukaydet'])){

	$menu_id=$_POST['menu_id'];
	$menu_seourl=seo($_POST['menu_ad']);
	$menukaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$menukaydet->execute(array(		
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");

	} else {

		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
	
}



if(isset($_POST['menuekle'])){

	
	$menu_seourl=seo($_POST['menu_ad']);
	$menukaydet=$db->prepare("INSERT into menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$update=$menukaydet->execute(array(		
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_seourl' => $menu_seourl,
		'menu_sira' => $_POST['menu_sira'],
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		header("Location:../production/menu.php?durum=ok");

	} else {

		header("Location:../production/menu.php?durum=no");
	}
	
}



 ?>