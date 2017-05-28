###################
Hasta Takip Sistemi
###################

Her sektörde olduğu gibi sağlık sektöründe de bilgi teknolojilerine ihtiyaç sürekli olarak duyulmaktadır.
Hasta ve doktor ilişkilerinden beklenen verim, hasta-doktor ikili görüşmelerinde kısıtlı zaman ve imkanlar nedeniyle yeterince alınamamaktadır.
Bu projede bir hasta takip sistemi yapılmıştır.
Bu sistem doktorların ilgilendikleri hastaları, hastalara tahsis edilen cihazlar aracılığıyla interaktif bir biçimde gözlemleyebilmesini hedeflemiştir.

************
Uygulama Hakkında
************

Proje kapsamında bir web sunucu üzerine kurulu olan dinemik bir web site, bir veritabanı sunucusu üzerinde çalışan bir VTYS ve veri toplamak için hastalara tahsis edilmiş Linux tabanlı cihazlar vardır.
Bu kapsamın oluşturulması için kurulum adımları bu bölümde açıklanmıştır.

*******************
Codeigniter
*******************

CodeIgniter, PHP ile dinamik uygulamalar geliştirmek için geliştirilmiş bir web uygulama geliştirme çatısı. MVC mimari deseni temeline göre geliştirilmiş olup günümüzde hızla yaygınlaşmaktadır.

Ayrıca CI, içeriğinde geliştirme sırasında kolaylık sağlayacak kütüphaneler, yardımcı sınıflar, eklentiler vb. barındırır.

**************************
Raspberry PI
**************************

İngiltere’deki Raspberry Pi vakfı tarafından geliştirilen, aslın amacı okullarda bilgisayar temelli eğitimi geliştirmek ve çocuklara bilgisayarı öğretmek olan, kredi kartı büyüklüğünde, içinde çeşitli Linux ve Android dağıtımları kurulabilen ARM mimarisine sahip fansız bir mini bilgisayardır.

Proje kapsamında bu bilgisayarlardan hasta başına bir adet tahsis edilerek, üzerine bağlı sensörler aracılığıyla hastanın biyolojik verileri sistemden canlı olarak izlenmesi sağlanmıştır.

Cihaz belirlenmiş zaman periyotlarında, cihazların üzerinde hastaya hazır verilen yazılımı tetiklemektedir.
Bu yazılım ise veri tabanına erişerek konfigürasyon ayarlarını kaydeder ve yayını başlatır.

*******************
Plotly API
*******************

Plotly bir veri görselleştirme uygulamasıdır.
Ücretli ve ücretsiz sunduğu hizmetler mevcuttur. Bir çok platform için API’ler sağlar.

Bu projede Python üzerinde Plotly API, sensör verilerini çizgi grafik olarak görsellemek için kullanılmıştır.
Bu grafik web uygulaması üzerinde gösterilmektedir.

***************
İleriki Adımlar
***************

Bir sonraki adım için hedefler :

- Otomatize edilmiş hasta cihazı ayarları.
- Tamamen stabil planlanmış izleme sistemi (CRON).
