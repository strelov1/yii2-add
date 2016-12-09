{{ void(this.beginPage()) }}
<!DOCTYPE html>
<html lang="{{ app.language }}">
<head>
    <meta charset="{{ app.charset }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ html.encode(this.title) }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css">
    {{ html.csrfMetaTags | raw }}
    {{ void(this.head) }}
</head>
<body>
{{ void(this.beginBody()) }}
<div class="wrap">
    <div class="container">
        {% block content %}{% endblock %}
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company></p>

        <p class="pull-right">{{ app.powered() }}</p>
    </div>
</footer>
</div>
{{ void(this.endBody()) }}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
{{ void(this.endPage()) }}