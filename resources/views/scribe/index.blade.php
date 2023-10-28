<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Paradiso API</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
                    body .content .python-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.25.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.25.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                                            <button type="button" class="lang-button" data-language-name="python">python</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-auth" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth">
                    <a href="#auth">Auth</a>
                </li>
                                    <ul id="tocify-subheader-auth" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-POSTapi-v1-auth">
                                <a href="#auth-POSTapi-v1-auth">Login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-v1-logout">
                                <a href="#auth-POSTapi-v1-logout">Logout</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-fallback" class="tocify-header">
                <li class="tocify-item level-1" data-unique="fallback">
                    <a href="#fallback">Fallback</a>
                </li>
                                    <ul id="tocify-subheader-fallback" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="fallback-GETapi--fallbackPlaceholder-">
                                <a href="#fallback-GETapi--fallbackPlaceholder-">Fallback route</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-merchant" class="tocify-header">
                <li class="tocify-item level-1" data-unique="merchant">
                    <a href="#merchant">Merchant</a>
                </li>
                                    <ul id="tocify-subheader-merchant" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="merchant-GETapi-v1-merchants--merchant_id-">
                                <a href="#merchant-GETapi-v1-merchants--merchant_id-">Get merchant profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="merchant-PUTapi-v1-merchants">
                                <a href="#merchant-PUTapi-v1-merchants">Update merchant profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-product" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product">
                    <a href="#product">Product</a>
                </li>
                                    <ul id="tocify-subheader-product" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-GETapi-v1-products--product_id-">
                                <a href="#product-GETapi-v1-products--product_id-">Get product details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETapi-v1-merchants--merchant--products">
                                <a href="#product-GETapi-v1-merchants--merchant--products">Get all products from a merchant.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-public" class="tocify-header">
                <li class="tocify-item level-1" data-unique="public">
                    <a href="#public">Public</a>
                </li>
                                    <ul id="tocify-subheader-public" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="public-GETapi-v1-cities">
                                <a href="#public-GETapi-v1-cities">Get all cities.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="public-GETapi-v1-provinces">
                                <a href="#public-GETapi-v1-provinces">Get all provinces.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="public-GETapi-v1-countries">
                                <a href="#public-GETapi-v1-countries">Get all countries.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                        <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: October 28, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="auth">Auth</h1>

    <p>APIs for authentication</p>

                                <h2 id="auth-POSTapi-v1-auth">Login</h2>

<p>
</p>

<p>Login to the application</p>

<span id="example-requests-POSTapi-v1-auth">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/auth" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=merchant"\
    --form "email=merchant@mail.com"\
    --form "password=password"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/auth"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'merchant');
body.append('email', 'merchant@mail.com');
body.append('password', 'password');

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/auth';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'merchant'
            ],
            [
                'name' =&gt; 'email',
                'contents' =&gt; 'merchant@mail.com'
            ],
            [
                'name' =&gt; 'password',
                'contents' =&gt; 'password'
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/auth'
files = {
  'name': (None, 'merchant'),
  'email': (None, 'merchant@mail.com'),
  'password': (None, 'password')}
payload = {
    "name": "merchant",
    "email": "merchant@mail.com",
    "password": "password"
}
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth">
</span>
<span id="execution-results-POSTapi-v1-auth" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth" data-method="POST"
      data-path="api/v1/auth"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth"
                    onclick="tryItOut('POSTapi-v1-auth');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth"
                    onclick="cancelTryOut('POSTapi-v1-auth');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-auth"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-auth"
               value="merchant"
               data-component="body">
    <br>
<p>The name of the user. Example: <code>merchant</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-auth"
               value="merchant@mail.com"
               data-component="body">
    <br>
<p>The email of the user. Example: <code>merchant@mail.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-auth"
               value="password"
               data-component="body">
    <br>
<p>The password of the user. Example: <code>password</code></p>
        </div>
        </form>

                    <h2 id="auth-POSTapi-v1-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Logout from the application</p>

<span id="example-requests-POSTapi-v1-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/logout" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/logout"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/logout'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Logged out&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-logout" data-method="POST"
      data-path="api/v1/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-logout"
                    onclick="tryItOut('POSTapi-v1-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-logout"
                    onclick="cancelTryOut('POSTapi-v1-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-logout"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="fallback">Fallback</h1>

    

                                <h2 id="fallback-GETapi--fallbackPlaceholder-">Fallback route</h2>

<p>
</p>

<p>This route will be used if the requested route is not found.</p>

<span id="example-requests-GETapi--fallbackPlaceholder-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/\" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/\"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/\';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/\'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi--fallbackPlaceholder-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Endpoint not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi--fallbackPlaceholder-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi--fallbackPlaceholder-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi--fallbackPlaceholder-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi--fallbackPlaceholder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi--fallbackPlaceholder-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi--fallbackPlaceholder-" data-method="GET"
      data-path="api/{fallbackPlaceholder}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi--fallbackPlaceholder-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi--fallbackPlaceholder-"
                    onclick="tryItOut('GETapi--fallbackPlaceholder-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi--fallbackPlaceholder-"
                    onclick="cancelTryOut('GETapi--fallbackPlaceholder-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi--fallbackPlaceholder-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/{fallbackPlaceholder}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>fallbackPlaceholder</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fallbackPlaceholder"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="\"
               data-component="url">
    <br>
<p>Example: <code>\</code></p>
            </div>
                    </form>

                <h1 id="merchant">Merchant</h1>

    

                                <h2 id="merchant-GETapi-v1-merchants--merchant_id-">Get merchant profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants--merchant_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/merchants/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/merchants/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/merchants/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/merchants/1'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants--merchant_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;merchant&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/merchants/logo/SE6RnlyAukubNRLPVsqDDMSXQYSkGzajuNKqfXSc.png&quot;,
        &quot;is_highlight&quot;: 0,
        &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;created_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-10-28T10:01:35.000000Z&quot;,
        &quot;profile&quot;: {
            &quot;id&quot;: 1,
            &quot;description&quot;: &quot;Travel untuk segala kalangan&quot;,
            &quot;address&quot;: &quot;Jl. Ahmad Yani&quot;,
            &quot;banner&quot;: &quot;https://picsum.photos/500/250&quot;,
            &quot;ktp_number&quot;: &quot;1234567890123456&quot;,
            &quot;npwp_number&quot;: &quot;123456789012345&quot;,
            &quot;siup_number&quot;: &quot;1234567890123&quot;,
            &quot;ktp&quot;: &quot;https://picsum.photos/500/250&quot;,
            &quot;npwp&quot;: null,
            &quot;siup&quot;: null
        },
        &quot;level&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;standart&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00aa55?text=voluptas&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Accepted&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00eeaa?text=sit&quot;,
            &quot;color&quot;: &quot;#3e26ec&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants--merchant_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants--merchant_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants--merchant_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants--merchant_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants--merchant_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants--merchant_id-" data-method="GET"
      data-path="api/v1/merchants/{merchant_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants--merchant_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants--merchant_id-"
                    onclick="tryItOut('GETapi-v1-merchants--merchant_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants--merchant_id-"
                    onclick="cancelTryOut('GETapi-v1-merchants--merchant_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants--merchant_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/{merchant_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-merchants--merchant_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants--merchant_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>merchant_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="merchant_id"                data-endpoint="GETapi-v1-merchants--merchant_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the merchant. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="merchant-PUTapi-v1-merchants">Update merchant profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-merchants">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/merchants" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=quia"\
    --form "address=quae"\
    --form "description=Sunt eligendi ipsum nihil quo quidem pariatur aliquam."\
    --form "ktp_number=lzxjzzajfflopwze"\
    --form "npwp_number=jecxcasjfpimzjk"\
    --form "siup_number=mdkwmqypcipfv"\
    --form "logo=@/tmp/phpRw8LPw" \
    --form "banner=@/tmp/phpLIEMQ6" \
    --form "ktp=@/tmp/php49M6ub" \
    --form "npwp=@/tmp/phpk4VrAe" \
    --form "siup=@/tmp/phpsQarkA" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/merchants"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'quia');
body.append('address', 'quae');
body.append('description', 'Sunt eligendi ipsum nihil quo quidem pariatur aliquam.');
body.append('ktp_number', 'lzxjzzajfflopwze');
body.append('npwp_number', 'jecxcasjfpimzjk');
body.append('siup_number', 'mdkwmqypcipfv');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('banner', document.querySelector('input[name="banner"]').files[0]);
body.append('ktp', document.querySelector('input[name="ktp"]').files[0]);
body.append('npwp', document.querySelector('input[name="npwp"]').files[0]);
body.append('siup', document.querySelector('input[name="siup"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/merchants';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'quia'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'quae'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Sunt eligendi ipsum nihil quo quidem pariatur aliquam.'
            ],
            [
                'name' =&gt; 'ktp_number',
                'contents' =&gt; 'lzxjzzajfflopwze'
            ],
            [
                'name' =&gt; 'npwp_number',
                'contents' =&gt; 'jecxcasjfpimzjk'
            ],
            [
                'name' =&gt; 'siup_number',
                'contents' =&gt; 'mdkwmqypcipfv'
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('/tmp/phpRw8LPw', 'r')
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('/tmp/phpLIEMQ6', 'r')
            ],
            [
                'name' =&gt; 'ktp',
                'contents' =&gt; fopen('/tmp/php49M6ub', 'r')
            ],
            [
                'name' =&gt; 'npwp',
                'contents' =&gt; fopen('/tmp/phpk4VrAe', 'r')
            ],
            [
                'name' =&gt; 'siup',
                'contents' =&gt; fopen('/tmp/phpsQarkA', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/merchants'
files = {
  'name': (None, 'quia'),
  'address': (None, 'quae'),
  'description': (None, 'Sunt eligendi ipsum nihil quo quidem pariatur aliquam.'),
  'ktp_number': (None, 'lzxjzzajfflopwze'),
  'npwp_number': (None, 'jecxcasjfpimzjk'),
  'siup_number': (None, 'mdkwmqypcipfv'),
  'logo': open('/tmp/phpRw8LPw', 'rb'),
  'banner': open('/tmp/phpLIEMQ6', 'rb'),
  'ktp': open('/tmp/php49M6ub', 'rb'),
  'npwp': open('/tmp/phpk4VrAe', 'rb'),
  'siup': open('/tmp/phpsQarkA', 'rb')}
payload = {
    "name": "quia",
    "address": "quae",
    "description": "Sunt eligendi ipsum nihil quo quidem pariatur aliquam.",
    "ktp_number": "lzxjzzajfflopwze",
    "npwp_number": "jecxcasjfpimzjk",
    "siup_number": "mdkwmqypcipfv"
}
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, files=files)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-merchants">
</span>
<span id="execution-results-PUTapi-v1-merchants" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-merchants"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-merchants"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-merchants" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-merchants">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-merchants" data-method="PUT"
      data-path="api/v1/merchants"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-merchants', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-merchants"
                    onclick="tryItOut('PUTapi-v1-merchants');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-merchants"
                    onclick="cancelTryOut('PUTapi-v1-merchants');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-merchants"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/merchants</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-merchants"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-merchants"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-merchants"
               value="quia"
               data-component="body">
    <br>
<p>Example: <code>quia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="PUTapi-v1-merchants"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/tmp/phpRw8LPw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-merchants"
               value="quae"
               data-component="body">
    <br>
<p>Example: <code>quae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="banner"                data-endpoint="PUTapi-v1-merchants"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/tmp/phpLIEMQ6</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-merchants"
               value="Sunt eligendi ipsum nihil quo quidem pariatur aliquam."
               data-component="body">
    <br>
<p>Example: <code>Sunt eligendi ipsum nihil quo quidem pariatur aliquam.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ktp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ktp_number"                data-endpoint="PUTapi-v1-merchants"
               value="lzxjzzajfflopwze"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>lzxjzzajfflopwze</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>npwp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="npwp_number"                data-endpoint="PUTapi-v1-merchants"
               value="jecxcasjfpimzjk"
               data-component="body">
    <br>
<p>Must be 15 characters. Example: <code>jecxcasjfpimzjk</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>siup_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="siup_number"                data-endpoint="PUTapi-v1-merchants"
               value="mdkwmqypcipfv"
               data-component="body">
    <br>
<p>Must be 13 characters. Example: <code>mdkwmqypcipfv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ktp</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="ktp"                data-endpoint="PUTapi-v1-merchants"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/tmp/php49M6ub</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>npwp</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="npwp"                data-endpoint="PUTapi-v1-merchants"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/tmp/phpk4VrAe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>siup</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="siup"                data-endpoint="PUTapi-v1-merchants"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Must be an image. Example: <code>/tmp/phpsQarkA</code></p>
        </div>
        </form>

                <h1 id="product">Product</h1>

    

                                <h2 id="product-GETapi-v1-products--product_id-">Get product details.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/products/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/products/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/products/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/products/1'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products--product_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;product&quot;,
        &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;duration&quot;: 1,
        &quot;start_date&quot;: &quot;16/10/2023&quot;,
        &quot;end_date&quot;: &quot;17/10/2023&quot;,
        &quot;price&quot;: 100000,
        &quot;unit&quot;: &quot;unit&quot;,
        &quot;discount&quot;: null,
        &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
        &quot;address&quot;: &quot;Jl. Test&quot;,
        &quot;coordinate&quot;: &quot;123,123&quot;,
        &quot;max_person&quot;: 10,
        &quot;min_person&quot;: 1,
        &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;is_published&quot;: 0,
        &quot;created_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
        &quot;sub_category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;architecto&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00ccdd?text=voluptatem&quot;,
            &quot;product_category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;commodi&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00ee55?text=ut&quot;
            }
        },
        &quot;merchant&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/merchants/logo/SE6RnlyAukubNRLPVsqDDMSXQYSkGzajuNKqfXSc.png&quot;,
            &quot;is_highlight&quot;: 0,
            &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;created_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-10-28T10:01:35.000000Z&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;draft&quot;,
            &quot;color&quot;: &quot;PapayaWhip&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/CCCCCC&quot;
        },
        &quot;schedules&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;date&quot;: &quot;16/10/2023&quot;,
                &quot;title&quot;: &quot;day 1&quot;,
                &quot;schedule_days&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;start_time&quot;: &quot;08:00&quot;,
                        &quot;end_time&quot;: &quot;10:00&quot;,
                        &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;start_time&quot;: &quot;13:00&quot;,
                        &quot;end_time&quot;: &quot;14:00&quot;,
                        &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;
                    }
                ]
            }
        ],
        &quot;reviews&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;review&quot;: &quot;revieww&quot;,
                &quot;rating&quot;: 5,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;merchant&quot;,
                    &quot;user_level&quot;: 3,
                    &quot;email&quot;: &quot;merchant@mail.com&quot;,
                    &quot;phone&quot;: &quot;081234567890&quot;,
                    &quot;status&quot;: 1,
                    &quot;created_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;
                }
            }
        ],
        &quot;include_excludes&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;is_include&quot;: 1
            },
            {
                &quot;id&quot;: 2,
                &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;is_include&quot;: 0
            }
        ],
        &quot;facilities&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;parkir&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00bbdd?text=minus&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;ac&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00cccc?text=eum&quot;
            }
        ],
        &quot;faqs&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;question&quot;: &quot;question1&quot;,
                &quot;answer&quot;: &quot;answer1&quot;,
                &quot;is_global&quot;: 0
            },
            {
                &quot;id&quot;: 2,
                &quot;question&quot;: &quot;question2&quot;,
                &quot;answer&quot;: &quot;answer2&quot;,
                &quot;is_global&quot;: 0
            }
        ],
        &quot;terms&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;term&quot;: &quot;term1&quot;,
                &quot;is_global&quot;: 0
            },
            {
                &quot;id&quot;: 2,
                &quot;term&quot;: &quot;term2&quot;,
                &quot;is_global&quot;: 0
            }
        ],
        &quot;images&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;image&quot;: &quot;https://picsum.photos/360/360&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;image&quot;: &quot;https://picsum.photos/360/360&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products--product_id-" data-method="GET"
      data-path="api/v1/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products--product_id-"
                    onclick="tryItOut('GETapi-v1-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products--product_id-"
                    onclick="cancelTryOut('GETapi-v1-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products--product_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETapi-v1-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="product-GETapi-v1-merchants--merchant--products">Get all products from a merchant.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants--merchant--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/merchants/1/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/merchants/1/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/merchants/1/products';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/merchants/1/products'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants--merchant--products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;product&quot;,
            &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;duration&quot;: 1,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;17/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;unit&quot;,
            &quot;discount&quot;: null,
            &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
            &quot;address&quot;: &quot;Jl. Test&quot;,
            &quot;coordinate&quot;: &quot;123,123&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-10-25T06:18:21.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/api/v1/merchants/1/products?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/api/v1/merchants/1/products?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/v1/merchants/1/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/api/v1/merchants/1/products&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants--merchant--products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants--merchant--products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants--merchant--products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants--merchant--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants--merchant--products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants--merchant--products" data-method="GET"
      data-path="api/v1/merchants/{merchant}/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants--merchant--products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants--merchant--products"
                    onclick="tryItOut('GETapi-v1-merchants--merchant--products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants--merchant--products"
                    onclick="cancelTryOut('GETapi-v1-merchants--merchant--products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants--merchant--products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/{merchant}/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-merchants--merchant--products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants--merchant--products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>merchant</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="merchant"                data-endpoint="GETapi-v1-merchants--merchant--products"
               value="1"
               data-component="url">
    <br>
<p>The merchant. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="public">Public</h1>

    

                                <h2 id="public-GETapi-v1-cities">Get all cities.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-cities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/cities" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/cities"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/cities';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/cities'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-cities">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Gislasonport&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aabb?text=beatae&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Sigmund&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Reichelview&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005522?text=mollitia&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Sigmund&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Colliermouth&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ff55?text=aut&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Sigmund&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Lake Alyce&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/006688?text=deleniti&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Toneyside&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Loisview&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0066ee?text=dolores&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Toneyside&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Buckmouth&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/002244?text=quia&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Toneyside&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;West Tess&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/004400?text=tempore&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Boylefurt&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;West Rudy&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bb55?text=alias&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Boylefurt&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Kaylahton&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aa66?text=iure&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Boylefurt&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;East Felipaville&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ccaa?text=quis&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Ziemefurt&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Millietown&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0099cc?text=laboriosam&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Ziemefurt&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Derekfurt&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0066ee?text=qui&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Ziemefurt&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Okunevaview&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ddff?text=omnis&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Delmer&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Kleinton&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/006699?text=et&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Delmer&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Bogisichmouth&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0022cc?text=voluptatibus&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Delmer&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-cities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-cities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-cities" data-method="GET"
      data-path="api/v1/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-cities"
                    onclick="tryItOut('GETapi-v1-cities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-cities"
                    onclick="cancelTryOut('GETapi-v1-cities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-cities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/cities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-cities"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="public-GETapi-v1-provinces">Get all provinces.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-provinces">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/provinces" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/provinces"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/provinces';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/provinces'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-provinces">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Lake Sigmund&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Toneyside&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Boylefurt&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Ziemefurt&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;North Delmer&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-provinces" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-provinces"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-provinces"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-provinces" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-provinces">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-provinces" data-method="GET"
      data-path="api/v1/provinces"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-provinces', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-provinces"
                    onclick="tryItOut('GETapi-v1-provinces');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-provinces"
                    onclick="cancelTryOut('GETapi-v1-provinces');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-provinces"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/provinces</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-provinces"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-provinces"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="public-GETapi-v1-countries">Get all countries.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-countries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/countries" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/countries"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost/api/v1/countries';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://localhost/api/v1/countries'
headers = {
  'Content-Type': 'multipart/form-data',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-countries">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Svalbard &amp; Jan Mayen Islands&quot;,
            &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/0033ee?text=molestiae&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-countries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-countries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-countries"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-countries">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-countries" data-method="GET"
      data-path="api/v1/countries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-countries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-countries"
                    onclick="tryItOut('GETapi-v1-countries');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-countries"
                    onclick="cancelTryOut('GETapi-v1-countries');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-countries"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/countries</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-countries"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-countries"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                                                        <button type="button" class="lang-button" data-language-name="python">python</button>
                            </div>
            </div>
</div>
</body>
</html>
