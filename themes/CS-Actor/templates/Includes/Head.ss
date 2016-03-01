<head>
    <% base_tag %>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title</title>
    <% if $MetaDescription %>$MetaTags(false)<% else %><meta name="description" content="{$SiteConfig.Title}: {$Title}"><% end_if %>

    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/magnific/magnific-popup.css">
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="$ThemeDir/dist/assets/plugins/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css">

    <!-- Main CSS -->
    <link href="$ThemeDir/dist/styles/main.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="$ThemeDir/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="$ThemeDir/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="$ThemeDir/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="$ThemeDir/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="$ThemeDir/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="$ThemeDir/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="$ThemeDir/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="$ThemeDir/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="$ThemeDir/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="$ThemeDir/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="$ThemeDir/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="$ThemeDir/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="$ThemeDir/favicon/favicon-16x16.png">
    <link rel="manifest" href="$ThemeDir/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,700|Material+Icons' rel='stylesheet' type='text/css'>

    <meta property="og:title" content="$Title"/>
    <% if Item %>
        <meta property="og:url" content="$AbsoluteLink/$Item.URLSegment"/>
    <% else %>
        <meta property="og:url" content="$AbsoluteLink"/>
        <meta property="og:description" content="$MetaDescription" />
    <% end_if %>
    <% if Image %>
        <link rel="image_src" href="$Image.FocusFill(800,600).AbsoluteLink" />
        <meta property="og:image" content="$Image.FocusFill(800,600).AbsoluteLink"/>
    <% end_if %>

    <% include GoogleAnalytics %>

    <% if SiteConfig.PrimaryColor %>
        <style>
            a, .primary-color,
            .navbar-nav li a:hover {
                color: $SiteConfig.PrimaryColor;
            }
            .primary-hover:hover {
                color: $SiteConfig.PrimaryColor !important;
            }
            a:hover,
            a.primary-color:hover{
                color: #555555;
            }
            .btn-primary {
                background-color: $SiteConfig.PrimaryColor;
            }
            .btn-primary:hover {
                background-color: #555555;
            }
            @media (max-width: 768px) {
              .header-navbar .navbar-collapse {
                background: $SiteConfig.PrimaryColor;
              }
            }
        </style>
    <% end_if %>
</head>








