<?php
    include("basicIncludes.php");
    session_start();
    require_once 'classes/picture.php';
    
    /*if(isset($_GET["image"]))
        $image = new Picture($_GET["image"]);
    else
        header("Location: index.php");*/
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fitspo Share</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/top.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/image.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="arrow.js"></script>
    </head>
    <body>
        <div id="container">
            <?php include "pieces/title.php" ?>
            <div id="content">
                <h1>The title of the image</h1>
                <div id="imageContainer">
                    <div id="image">
                        <img src="images/uploads/test.jpg">
                    </div>
                    <div id="leftArrow" class="arrow">
                        <img src="images/static/arrow.png">
                    </div>
                    <div id="rightArrow" class="arrow">
                        <img src="images/static/arrow.png">
                    </div>
                </div>
                <div styl="height:1000px;width:100%">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a viverra quam. Nulla imperdiet nulla rutrum ante auctor, ac ornare velit pellentesque. Praesent nec ligula id magna molestie congue. Donec quis imperdiet lorem. Cras quis volutpat eros. Donec suscipit, ante non feugiat volutpat, tortor sapien posuere libero, ut faucibus eros ligula ut arcu. Nunc laoreet tincidunt tortor, vulputate viverra justo aliquam ut. Aenean et turpis vel felis scelerisque cursus.

Donec rhoncus, libero ut euismod interdum, neque nisi vulputate sapien, ac volutpat quam orci vel arcu. Nam dui nunc, semper quis turpis in, sagittis porta leo. Aliquam vestibulum adipiscing orci, non lacinia mauris commodo in. Integer vel sagittis est. Integer eu sodales dolor. Nunc quis orci sollicitudin, ultrices lacus non, pharetra dolor. Nullam vel sapien at sapien vehicula interdum vitae a leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nulla dui, volutpat a est quis, vestibulum accumsan mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam eget consectetur diam. Nunc gravida eu leo nec convallis. Vivamus rutrum gravida enim, eu elementum elit condimentum tempus. Phasellus vel mauris at neque consectetur feugiat vitae sit amet libero.

Pellentesque faucibus sed lorem a condimentum. Morbi tincidunt augue vitae interdum lobortis. Aliquam elementum aliquam blandit. Phasellus blandit laoreet magna ut eleifend. Mauris non ante a leo rhoncus blandit. Sed tincidunt sapien in tellus mollis sollicitudin. Suspendisse feugiat vitae urna sed rutrum. Sed sagittis a est sed aliquet. Nullam in arcu a lectus posuere malesuada eget at mi. Quisque vel faucibus libero. Donec pellentesque quis lacus quis interdum.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non accumsan eros. Mauris vel sapien vel ipsum elementum vulputate sit amet nec quam. Nunc laoreet viverra sem vitae feugiat. Mauris rutrum dolor magna, et euismod lectus porttitor eget. Nunc non odio a mi interdum cursus interdum aliquam odio. Etiam gravida, ante a placerat congue, lectus erat egestas lectus, a feugiat est eros quis nulla. Maecenas hendrerit convallis nulla, a sollicitudin ligula consequat aliquam. Pellentesque sed magna pretium, consequat diam et, varius ante. Pellentesque sodales egestas odio non fermentum. Nam in vehicula sapien.

Vivamus fermentum ornare nisi ut feugiat. In ut tellus quis nisi iaculis cursus. Donec malesuada massa at interdum porttitor. Duis purus ipsum, iaculis eu sem pellentesque, luctus lobortis libero. Aliquam eget metus bibendum, placerat massa eu, hendrerit ligula. Nam dapibus sapien arcu, a convallis sapien sodales quis. Nulla nec dapibus nulla. Curabitur neque quam, interdum vitae erat nec, venenatis pharetra urna.

Suspendisse imperdiet vehicula urna, at suscipit enim lobortis eget. Morbi vestibulum velit eu felis ultrices accumsan id vel quam. Morbi accumsan, elit sit amet tincidunt dapibus, urna neque hendrerit sapien, id mattis augue magna eget est. Morbi ac placerat tortor. Nulla porttitor dapibus consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris ac rutrum ipsum, id dignissim lectus.

Duis eget dui magna. Nam facilisis dui sed lacus ornare consequat. Proin laoreet eget massa vitae pulvinar. Donec et dictum turpis. Sed fermentum eu sapien quis condimentum. Nullam scelerisque odio non quam consectetur ullamcorper. Duis elementum nunc elit, et placerat urna semper vel. Donec sodales in leo et iaculis. Aliquam erat volutpat. Nunc vitae tellus vel sapien venenatis vehicula ac id nisl. In ante orci, varius fermentum eros nec, pellentesque pretium magna. Aliquam mattis magna dui, a ultricies libero auctor sit amet. Phasellus ornare a metus vitae condimentum. Nullam porttitor dolor id odio pretium interdum.

Vestibulum pharetra neque est, nec lacinia risus faucibus vel. Curabitur urna dolor, iaculis a hendrerit ultricies, semper eget justo. Duis blandit velit ante, non dictum mauris commodo pulvinar. Vestibulum euismod iaculis ullamcorper. Proin nec felis suscipit, lobortis nulla sit amet, placerat elit. Suspendisse at mauris in sem eleifend convallis. Sed sit amet nisl odio. Pellentesque vestibulum porta sapien id pretium. Sed gravida, odio nec fermentum ultricies, diam ante iaculis purus, non rutrum nibh mauris vitae arcu. Aliquam porttitor, purus at bibendum posuere, tellus risus blandit ligula, eu sodales ipsum neque vitae turpis. Integer in mauris vel diam accumsan tempor sed non tellus. Aliquam commodo erat ultricies enim tincidunt rutrum. Morbi mattis tincidunt est, non vestibulum lectus rhoncus nec.

Nullam at pellentesque augue. Sed scelerisque pulvinar tempus. Proin pretium erat vitae lorem viverra aliquet. Nam mauris nisl, ultricies eget turpis et, consequat tincidunt eros. Nunc consequat sodales leo sit amet pretium. Aliquam accumsan sollicitudin magna, non viverra massa rhoncus nec. Proin tincidunt, purus eu tristique dictum, ligula odio aliquam sem, sed pretium tellus purus at lacus. Fusce imperdiet rhoncus neque sed pharetra. In non facilisis magna, vitae vulputate ligula. Nam hendrerit euismod nulla in vulputate. Suspendisse suscipit lobortis dictum. Donec sit amet dapibus mauris. Mauris in ultrices lectus. Cras pulvinar a nulla eu convallis. Vestibulum vel convallis quam.

Vestibulum sodales, lectus ut sollicitudin adipiscing, magna sapien interdum urna, at suscipit massa odio non metus. Etiam consequat magna nulla, vel luctus risus accumsan non. Phasellus molestie sit amet lectus a pellentesque. Nam quis elit vel tellus volutpat posuere at a nisi. Nulla dapibus, orci ac viverra luctus, sem eros ultricies turpis, ac semper erat velit sed ipsum. Mauris consectetur metus in nulla dictum, sed lobortis lorem euismod. Aliquam diam tortor, rhoncus eget sem mattis, tristique ultricies ipsum. Vivamus tristique, purus sed dignissim facilisis, leo turpis ultricies mi, eget lacinia massa augue sed elit. Mauris elementum porttitor tellus vitae ornare. Proin a aliquet est, consequat aliquam felis. Maecenas ornare ultricies orci, et imperdiet eros blandit at.

Donec dignissim massa vel lacus adipiscing, eu consectetur felis vulputate. Pellentesque varius dolor ut nulla mollis, nec aliquet mauris rutrum. Nulla at enim eu lorem fermentum iaculis sit amet sit amet ipsum. Fusce eu gravida lectus, quis volutpat nulla. Pellentesque tincidunt sit amet dui sit amet pretium. Sed porttitor facilisis nulla, a varius odio mollis vel. Integer ut consequat sapien, ut cursus urna. Sed quis accumsan diam.

Nunc aliquam lorem convallis, dictum tellus quis, placerat nunc. Sed varius est interdum lorem pretium dictum. Maecenas pellentesque, quam non rutrum vestibulum, mauris mi tincidunt tellus, vitae rutrum metus purus vel turpis. Maecenas quis feugiat enim. Nam id feugiat nulla, eu feugiat nisi. Maecenas rhoncus nisi eget elit auctor molestie. Donec venenatis malesuada purus in venenatis. Etiam a viverra mauris. Vivamus mattis aliquet turpis id elementum. Etiam pharetra quis leo non fringilla. Phasellus laoreet ligula sit amet nulla blandit lobortis. Proin lobortis id nulla quis euismod.

Morbi sapien eros, suscipit quis nisi malesuada, commodo mollis sapien. Donec in nisl nunc. Cras ut fringilla urna, vel pellentesque dui. Nunc sem lacus, egestas id gravida viverra, facilisis eu nunc. Morbi sit amet ipsum faucibus, rutrum turpis sed, fermentum lacus. Donec tristique leo felis, vitae aliquam mauris tristique eget. Fusce ornare massa vel commodo venenatis. Donec fringilla risus non nibh tempor, ut congue quam volutpat. Aliquam nec tellus risus. Cras elementum felis a urna bibendum, et egestas leo tempus.

Donec lobortis, libero et molestie hendrerit, sem nulla suscipit dolor, quis hendrerit nibh leo tempor tortor. Donec sit amet nulla auctor, interdum ipsum nec, fringilla libero. Curabitur at erat sit amet nibh commodo blandit. Maecenas a velit orci. Sed tincidunt, quam sed gravida sodales, nulla massa hendrerit dolor, a sollicitudin elit tellus id ligula. Nullam dignissim, quam ut blandit vulputate, felis sapien pellentesque orci, at convallis nunc ipsum eu purus. Aenean a gravida mauris. Nunc fermentum dolor nec nisi ullamcorper congue. Pellentesque mauris lectus, posuere eu ultricies sit amet, lobortis ut nunc. Morbi consequat rhoncus porttitor. Proin rhoncus enim sit amet sem blandit dignissim. Donec nisl felis, sagittis ut purus et, rutrum lacinia nibh. Donec vitae sodales massa. Donec vitae justo ut mauris venenatis mollis. Aliquam elementum ipsum eu erat fringilla ultricies.

Sed ultrices odio eget hendrerit dictum. Cras vehicula diam vel rutrum tristique. Cras volutpat, est placerat euismod interdum, ligula magna molestie augue, sit amet lobortis nisl turpis sed turpis. Nam et nulla sed eros convallis facilisis. Curabitur a blandit nulla. Fusce pretium consectetur odio, vel pellentesque nulla semper a. Curabitur iaculis lacus quis ligula condimentum, vitae convallis erat vehicula. Morbi sollicitudin, felis vitae luctus porttitor, nulla urna dictum elit, vitae luctus arcu dui at neque. Quisque congue, quam at dictum sagittis, quam purus ornare dolor, ullamcorper imperdiet leo ante eget orci.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed a turpis dolor. Cras lobortis justo vel purus scelerisque, sed viverra arcu tristique. Quisque aliquam eros at tortor dictum porttitor. Quisque non mi metus. Pellentesque sit amet molestie urna. Curabitur eu arcu urna. Cras vel libero urna. Aliquam eget augue vehicula, bibendum ligula et, dapibus felis. Proin nec lorem vitae nisi semper porta a id turpis. Nunc vel libero ut est mattis adipiscing eget commodo diam. Proin malesuada ipsum arcu, id lacinia quam malesuada in.

Proin at tincidunt ligula. Cras imperdiet nunc eget porttitor vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam eu scelerisque nisi. Proin suscipit posuere diam. Sed orci ante, volutpat ut nisl at, cursus ultricies erat. Maecenas sit amet tortor justo. Vivamus ligula arcu, faucibus ac dolor in, blandit sollicitudin elit. Sed ut quam elementum, interdum felis eget, tincidunt ante. Vestibulum et turpis vitae dolor faucibus ultricies.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi mattis diam sed scelerisque mollis. Proin vitae ullamcorper turpis, vel porttitor odio. Integer tempor mattis dui, at dignissim ante mollis non. Pellentesque vulputate elit lobortis, placerat tortor in, sagittis leo. Aenean viverra imperdiet lobortis. Vestibulum in mauris in lorem mattis sagittis pulvinar sit amet tellus. Morbi vel mi mi. Sed ornare aliquam metus, eget egestas neque ultricies ac. Aliquam egestas turpis in quam iaculis, sit amet mollis velit posuere. Proin id hendrerit libero, a euismod elit.

In commodo lacus quis purus consequat, non imperdiet metus mattis. In scelerisque vestibulum viverra. Morbi dapibus tortor eget ipsum bibendum, a ultrices massa porta. Donec dignissim tellus nec velit porttitor, sit amet eleifend metus ultrices. Nullam molestie ligula mauris, iaculis fringilla dolor tincidunt quis. Vivamus nunc dolor, porttitor vel augue non, faucibus venenatis odio. Nam ac quam et urna commodo feugiat sed sed nunc. Fusce quis diam vel eros porta dignissim. Suspendisse blandit ultrices tortor, in auctor velit faucibus nec. Phasellus aliquam sit amet risus in vehicula. Aliquam pretium justo elit, sed pellentesque velit ultricies iaculis. Integer tempus erat pulvinar, ornare mi tristique, congue sem. Vivamus posuere libero dui, dignissim porttitor felis varius sit amet. Proin sed risus turpis. In consequat odio mauris, vitae aliquam nisi tristique sit amet.

Maecenas auctor libero id nibh venenatis, at egestas nulla laoreet. Proin feugiat tincidunt ligula, eu pharetra magna bibendum in. Sed eget elit lectus. Suspendisse posuere vel nisl vel lobortis. Donec ac consectetur neque, ut mattis velit. Mauris tempus aliquam dapibus. Fusce lobortis nunc justo. Donec ac ante pharetra, laoreet mauris non, fermentum nunc. Praesent faucibus risus ut erat tempus ornare.
                </div>
            </div>
        </div>
    </body>
</html>