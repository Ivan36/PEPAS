
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/01FA0821-15D8-A844-9964-F069CA8C39D7/main.js" charset="UTF-8"></script><script type="text/javascript" nonce="f531734e5b6e44eba6c88f5dc5c" src="//local.adguard.org?ts=1573115110720&amp;type=content-script&amp;dmn=demo.itsolutionstuff.com&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1"></script>
<script type="text/javascript" nonce="f531734e5b6e44eba6c88f5dc5c" src="//local.adguard.org?ts=1573115110720&amp;name=AdGuard%20Assistant%20Beta&amp;name=AdGuard%20Popup%20Blocker%20%28Beta%29&amp;name=AdGuard%20Extra%20Beta&amp;type=user-script"></script><link rel="shortcut icon" type="image/png" href="logo.png"/>
    <meta name="msvalidate.01" content="8ECA64E8B529582CD06813FDFD9FAADE" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <style type="text/css">
        .col-s{
            white-space: pre-wrap;
        }
        #eXTReMe-Free-itsoluti{
            display: none;
        }
    </style>
    
    


    
    <meta name="google-site-verification" content="pOqfVgsFThvqJDmyrz2P9K4Ps07miNwa5C0u7XFyM48" />
    <link rel="shortcut icon" type="image/png" href="http://demo.itsolutionstuff.com/frontTheme/images/logo.png"/>
    <link href="/demoTheme/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://demo.itsolutionstuff.com/newTheme/fonts/fonts_new.css' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" type="text/css" href="http://demo.itsolutionstuff.com/demoTheme/custom.css">
<meta name="csrf-token" content="iQCcBHFJPDTDpcq4mVWR3ezQNamoHWIkclwuzZe2">
</head>
<body style="background:#e1e1e1">

<div>

<div class="demo-head">
    <h1 class="post-title">Demo - Laravel 5 Dependent Dropdown Example with demo</h1>
    <!-- Add 2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9165454495231653"
     data-ad-slot="7888465725"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<hr>

<script src="/plugin/jquery.js"></script>
<div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading"><strong>Select State and get bellow dynamic Related City</strong></div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control" style="width:350px">
                    <option value="">--- Select State ---</option>
                                            <option value="1">Gujarat</option>
                                            <option value="2">Maharastra</option>
                                            <option value="3">Rajasthan</option>
                                    </select>
            </div>
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>

<br/>
<hr/>
<div class="row">



<div class="col-md-6 text-center">

<!-- for demo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-9165454495231653"
     data-ad-slot="4041737328"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<div class="col-md-6 text-center">
<script id="mNCC" language="javascript">
    medianet_width = "300";
    medianet_height = "600";
    medianet_crid = "542757115";
    medianet_versionId = "3111299"; 
  </script>

</div>

</div>
<hr/>
<div class="bottom-bar">
    <center>
                <div>
                <center>
                    <a href="https://itsolutionstuff.com/tag/crud.html" class="btn btn-success btn-new-link" target="_blank">CRUD Tutorials</a>
                    <a href="https://itsolutionstuff.com/tag/laravel-56.html" class="btn btn-primary btn-new-link" target="_blank">Laravel 5.6</a>
                    <a href="https://itsolutionstuff.com/featured-post" class="btn btn-danger btn-new-link" target="_blank">Featured Post</a>
                    <a href="https://itsolutionstuff.com/tags" class="btn btn-info btn-new-link" target="_blank">Popular Tags</a>
                    <a href="https://itsolutionstuff.com/categories" class="btn btn-danger btn-new-link" target="_blank">Categories</a>
                </center>
            </div>
        </center>
</div>



</div>

<div class="ext">
        <script src="http://t1.extreme-dm.com/f.js" id="eXF-demoit-0" async defer></script>
    </div>

</body>
</html>