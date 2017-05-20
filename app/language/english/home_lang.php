<?php

/**
 * Home English Langauge File
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

$lang['home_title'] = "Home Page";
$lang['home_jumbotron_text'] = "PATIENT MONITORING SYSTEM";

$lang['home_license_title'] = 'Copyright %s &copy; Open source software.';
$lang['home_license_text'] = "
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the \"Software\"),
to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED \"AS IS\", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
";

/**
 * ABOUT SYSTEM
 */

$lang['home_about_system_title'] = "How System Works";
$lang['home_about_system_text'] = "
The system is based on PHP CodeIgniter framework.
<br><br>
Model-View-Controller architecture is used with langauge option.
";

$lang['home_about_system_apache_title'] = "Apache Sunucu";
$lang['home_about_system_apache_text'] = "
Apache, açık kaynak kodlu ve özgür bir Web sunucu programıdır. Apache Yazılım Vakfı tarafından geliştirilmektedir.
<br><br>
Unix, GNU, FreeBSD, Linux, Solaris, Novell NetWare, Mac OS X, Microsoft Windows, OS/2, TPF ve eComStation işletim sistemleri üzerinde çalışabilir.
<br><br>
Bu projede web isteklerini karşılamak için Windows işletim sistemi üzerinde bir Apache Web Sunucusu kullanılmıştır.
Birim ve entegrasyon testleri bu sunucu üzerinde yapılmıştır.
<br><br>
Canlı ortamda bu web sunucusunun Linux bir ana makinede çalışması hedeflenmektedir.
";

$lang['home_about_system_php_title'] = "PHP Betik Dili";
$lang['home_about_system_php_text'] = "
PHP (açılımı PHP: Hypertext Preprocessor) geniş bir kitle tarafından kullanılan, özellikle sanal yöreler üzerinde geliştirme için tasarlanmış HTML içine gömülebilen bir betik dilidir.
<br><br>
PHP, Javascript gibi kullanıcı tarafında çalışan bir dil olmayıp, sunucu tarafında çalışan bir dildir.
Böylece sunucu tarafında saklı olan php kodları 3. Kişiler tarafından görülemez. 3. Kişiler sadece çalışan PHP betiğinin sonucunu görebilirler.
";

$lang['home_about_system_mysql_title'] = "MySQL İlişkisel Veritabanı Yönetim Sistemi";
$lang['home_about_system_mysql_text'] = "
MySQL, altı milyondan fazla sistemde yüklü bulunan çoklu iş parçacıklı, çok kullanıcılı, hızlı ve sağlam bir veri tabanı yönetim sistemidir.
<br><br>
MySQL VTYS üzerinde projenin temel parçalarından olan iki veritabanı, bu veritabanlarında bulunan tablolar ve tetikleyiciler oluşturulmuş ve kullanılmıştır.
";

$lang['home_about_system_codeig_title'] = "Codeigniter";
$lang['home_about_system_codeig_text'] = "
CodeIgniter, PHP ile dinamik uygulamalar geliştirmek için geliştirilmiş bir web uygulama geliştirme çatısı.
MVC mimari deseni temeline göre geliştirilmiş olup günümüzde hızla yaygınlaşmaktadır.
<br><br>
Ayrıca CI, içeriğinde geliştirme sırasında kolaylık sağlayacak kütüphaneler, yardımcı sınıflar, eklentiler vb. barındırır.
";

$lang['home_about_system_rasppi_title'] = "Raspberry PI";
$lang['home_about_system_rasppi_text'] = "
İngiltere’deki Raspberry Pi vakfı tarafından geliştirilen, aslın amacı okullarda bilgisayar temelli eğitimi geliştirmek ve çocuklara bilgisayarı öğretmek olan,
kredi kartı büyüklüğünde, içinde çeşitli Linux ve Android dağıtımları kurulabilen ARM mimarisine sahip fansız bir mini bilgisayardır.
<br><br>
Proje kapsamında bu bilgisayarlardan hasta başına bir adet tahsis edilerek,
üzerine bağlı sensörler aracılığıyla hastanın biyolojik verileri sistemden canlı olarak izlenmesi sağlanmıştır.
<br><br>
Cihaz belirlenmiş zaman periyotlarında, cihazların üzerinde hastaya hazır verilen yazılımı tetiklemektedir.
Bu yazılım ise veri tabanına erişerek konfigürasyon ayarlarını kaydeder ve yayını başlatır.
";

$lang['home_about_system_plotly_title'] = "Plotly API";
$lang['home_about_system_plotly_text'] = "
Plotly bir veri görselleştirme uygulamasıdır. Ücretli ve ücretsiz sunduğu hizmetler mevcuttur.
Bir çok platform için API’ler sağlar.
<br><br>
Bu projede Python üzerinde Plotly API, sensör verilerini çizgi grafik olarak görsellemek için kullanılmıştır.
Bu grafik web uygulaması üzerinde gösterilmektedir.
";

$lang['home_about_system_tool_title'] = "Kullanılan Araçlar";
$lang['home_about_system_tool_text'] = "";

$lang['home_about_system_atom_title'] = "Atom Metin Editörü";
$lang['home_about_system_atom_text'] = "
Atom, GitHub Inc. Firmasının bir açık kaynaklı, kullanıcı tarafından kaynak kodu değiştirilebilir bir metin editörüdür.
Bir IDE olarak kullanılması için güçlü uygulama eklentileri barındırır. Bir çok dil desteği halihazırda bulunmaktadır veya daha sonradan eklentilerle eklenebilmektedir.
Hafif, kişiselleştirilebilir ve güçlü bir araçtır.
<br><br>
Proje kapsamında web uygulamasını geliştirmek için kullanılmıştır.
";

$lang['home_about_system_browser_title'] = "Web Tarayıcı";
$lang['home_about_system_browser_text'] = "Tarayıcı olarak Opera ve Chrome kullanılmıştır. Web uygulamasının kodları bu tarayıcılarda test edilmiştir.";

$lang['home_about_system_xampp_title'] = "XAMPP";
$lang['home_about_system_xampp_text'] = "
XAMPP (Extended Apache/MariaDB/PHP/Perl) bir web sunucusu yazılımıdır.
Xampp server ile bilgisayara PHP, MariaDB, Perl ve Apache yanında FileZilla ve MercuryMail gibi sistemler kurularak hazır bir web sunucusu oluşturulabilmektedir.
XAMPP serverda phpMyAdmin de kurulu olarak gelmektedir.
<br><br>
Proje kapsamında PHP, Apache Web Sunucu ve MariaDB (MySQL türevi) Veritabanı Sunucu araçları için kullanılmıştır.
";

$lang['home_about_system_pma_title'] = "MySQL Workbench ve phpMyAdmin";
$lang['home_about_system_pma_text'] = "VTYS araçları olarak MySQL Workbench ve phpMyAdmin kullanılmıştır.";

$lang['home_about_system_pyidle_title'] = "Python IDLE GUI";
$lang['home_about_system_pyidle_text'] = "
Raspberry PI tarafındaki yazılım geliştirmeleri Python dilinde yapılmıştır.
Python IDLE, Python uygulamaları geliştirmek için bir uygulama geliştirme ortamı sağlayan yazılım ürünüdür.
";

$lang['home_about_system_rdp_title'] = "Uzak Masaüstü Bağlantısı ve PUTTY";
$lang['home_about_system_rdp_text'] = "
Ağda bulunan Raspberry PI cihazlara erişmek için gerekli olan uzak masaüstü uygulamalarıdır.
Putty, SSH protokolü ile erişmek için kullanılmıştır.
Windows üzerinde ise Uzak Masaüstü Bağlantısı uygulaması aracılığı ile Raspberry PI ile grafik arayüzlü uzak masaüstü erişimi sağlanmıştır.
Raspberry PI’ye grafik arayüzlü uzak masaüstü erişiminin sağlanabilmesi için Raspberry PI’ye VNC sunucusunun etkinleştirilmesi gerekmektedir.
";

$lang['home_about_system_fzlla_title'] = "Filezilla FTP İstemcisi";
$lang['home_about_system_fzlla_text'] = "
Filezilla, dosya aktarım protokolü üzerinden makineler üzerinde dosya aktarımını sağlayan açık-kaynak kodlu bir yazılımdır.
<br><br>
Bu projede Raspberry PI cihazları ile ana makine üzerinde dosya aktarımı için kullanıldı. (Örneğin: kodlar)
";

$lang['home_about_system_git_title'] = "Git, Github ve Tortoise Git";
$lang['home_about_system_git_text'] = "
Git, kısa süre içerisinde yazılımcıların vazgeçilmezleri arasına giren bir sürüm/versiyon kontrol sistemidir. Aynı proje üzerinde, birden fazla kişi ile eşzamanlı olarak ya da farklı zamanlarda çalışılması durumlarında kodları birleştirmek ya da kod alışverişi yapmak oldukça çetrefillidir. Git bu gibi durumlarda kolaylık sağlamaktadır.
<br><br>
Tortise Git ise Git sisteminden kolayca faydalanmak için kullanılan nitelikli bir araçtır.
<br><br>
Github, Git destekli özgür lisanslı bir kod barındırma bulutudur.
<br><br>
Bu projede web uygulaması Github üzerinde bir repositoryde geliştirilmektedir ve barındırılmaktadır.
";

/**
 * ABOUT PROJECT
 */

$lang['home_about_project_title'] = "What is the project all about?";
$lang['home_about_project_text'] = "
Project lets doctor to see his/her patient's data.
";

$lang['home_about_project_future_title'] = "Future Aspects";
$lang['home_about_project_future_text'] = "
Goals for the next step are :
  <ol>
    <li> Automatized patient device configurations. </li>
    <li> Fully stable scheduled job tracking system (CRON). </li>
  </ol>
";

/**
 * ABOUT APPLICATION
 */

$lang['home_about_app_title'] = "About Application";
$lang['home_about_app_text'] = "
Proje kapsamında bir web sunucu üzerine kurulu olan dinemik bir web site,
bir veritabanı sunucusu üzerinde çalışan bir VTYS ve veri toplamak için
hastalara tahsis edilmiş Linux tabanlı cihazlar vardır.
Bu kapsamın oluşturulması için kurulum adımları bu bölümde açıklanmıştır.
";
$lang['home_about_app_arch_alt'] = "Application Architecture";
