<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Luxury Catering Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #gold;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #8B4513;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .category {
            margin-bottom: 40px;
            page-break-inside: avoid;
        }
        .category-title {
            color: #8B4513;
            font-size: 24px;
            border-bottom: 1px solid #DEB887;
            padding-bottom: 10px;
        }
        .category-subtitle {
            color: #666;
            font-size: 18px;
            font-style: italic;
            margin: 10px 0 20px;
        }
        .package {
            background: #FFF8DC;
            margin-bottom: 25px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .package-name {
            color: #8B4513;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .package-serves {
            color: #666;
            font-size: 14px;
            font-style: italic;
            margin-bottom: 15px;
        }
        .items {
            list-style-type: none;
            padding-left: 20px;
        }
        .item {
            margin: 8px 0;
            color: #444;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #DEB887;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LUXURY CATERING MENU</h1>
        <p>Exquisite Culinary Experiences</p>
    </div>

    @foreach($menu as $category => $data)
        <div class="category">
            <h2 class="category-title">{{ $data['title'] }}</h2>
            <p class="category-subtitle">{{ $data['subtitle'] }}</p>

            @foreach($data['packages'] as $package)
                <div class="package">
                    <h3 class="package-name">{{ $package['name'] }}</h3>
                    <p class="package-serves">Serves {{ $package['serves'] }}</p>
                    <ul class="items">
                        @foreach($package['items'] as $item)
                            <li class="item">• {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="footer">
        <p>Contact us for customized menu options and pricing</p>
        <p>Tel: +233 547 222 206 | Email: info@luxurycatering.com</p>
    </div>
</body>
</html>
