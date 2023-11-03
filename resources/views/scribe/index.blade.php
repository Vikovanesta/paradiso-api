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
        var tryItOutBaseUrl = "https://paradiso-api-vikovanesta.vercel.app/api";
        var useCsrf = Boolean(1);
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
                                                                                <li class="tocify-item level-2" data-unique="product-POSTapi-v1-merchants-products">
                                <a href="#product-POSTapi-v1-merchants-products">Create new product.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETapi-v1-merchants--merchant--products">
                                <a href="#product-GETapi-v1-merchants--merchant--products">Get all products from a merchant.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-PUTapi-v1-products--product_id-">
                                <a href="#product-PUTapi-v1-products--product_id-">Update a product.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-DELETEapi-v1-products--product_id-">
                                <a href="#product-DELETEapi-v1-products--product_id-">Delete a product.</a>
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
        <li>Last updated: November 3, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://paradiso-api-vikovanesta.vercel.app/api</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer your-token"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

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
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/auth" \
    --header "Accept: application/json" \
    --header "Content-Type: application/json" \
    --data "{
    \"name\": \"merchant\",
    \"email\": \"merchant@mail.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/auth"
);

const headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

let body = {
    "name": "merchant",
    "email": "merchant@mail.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/auth';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'merchant',
            'email' =&gt; 'merchant@mail.com',
            'password' =&gt; 'password',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/auth'
payload = {
    "name": "merchant",
    "email": "merchant@mail.com",
    "password": "password"
}
headers = {
  'Accept': 'application/json',
  'Content-Type': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
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
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth"
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
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/logout" \
    --header "Authorization: Bearer hca5bdkVfe34a8E6Pv6g1ZD" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/logout"
);

const headers = {
    "Authorization": "Bearer hca5bdkVfe34a8E6Pv6g1ZD",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer hca5bdkVfe34a8E6Pv6g1ZD',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/logout'
headers = {
  'Authorization': 'Bearer hca5bdkVfe34a8E6Pv6g1ZD',
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
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-logout"
               value="Bearer hca5bdkVfe34a8E6Pv6g1ZD"
               data-component="header">
    <br>
<p>Example: <code>Bearer hca5bdkVfe34a8E6Pv6g1ZD</code></p>
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/m1H" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/m1H"
);

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/m1H';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/m1H'
headers = {
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
x-ratelimit-remaining: 53
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
               value="m1H"
               data-component="url">
    <br>
<p>Example: <code>m1H</code></p>
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1" \
    --header "Authorization: Bearer 63gEhdeb1Dac5VP86Zvk4af" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1"
);

const headers = {
    "Authorization": "Bearer 63gEhdeb1Dac5VP86Zvk4af",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 63gEhdeb1Dac5VP86Zvk4af',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1'
headers = {
  'Authorization': 'Bearer 63gEhdeb1Dac5VP86Zvk4af',
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
x-ratelimit-remaining: 55
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;merchant&quot;,
        &quot;logo&quot;: &quot;https://picsum.photos/100/100&quot;,
        &quot;is_highlight&quot;: 0,
        &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;created_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
        &quot;profile&quot;: {
            &quot;id&quot;: 1,
            &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;address&quot;: &quot;Jl. Test&quot;,
            &quot;banner&quot;: &quot;https://picsum.photos/500/250&quot;,
            &quot;ktp_number&quot;: &quot;1234567890123456&quot;,
            &quot;npwp_number&quot;: null,
            &quot;siup_number&quot;: null,
            &quot;ktp&quot;: &quot;https://picsum.photos/500/250&quot;,
            &quot;npwp&quot;: null,
            &quot;siup&quot;: null
        },
        &quot;level&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;standart&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00bb33?text=quisquam&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Accepted&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00cc77?text=ut&quot;,
            &quot;color&quot;: &quot;#7e34e5&quot;
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
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants--merchant_id-"
               value="Bearer 63gEhdeb1Dac5VP86Zvk4af"
               data-component="header">
    <br>
<p>Example: <code>Bearer 63gEhdeb1Dac5VP86Zvk4af</code></p>
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
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants" \
    --header "Authorization: Bearer Daf5kV36adeZc1v4hg6E8Pb" \
    --header "Accept: application/json" \
    --header "Content-Type: multipart/form-data" \
    --form "name=est"\
    --form "address=ratione"\
    --form "description=Quo sit maiores ut a a explicabo tenetur nam."\
    --form "notes=accusamus"\
    --form "ktp_number=hrozfzsbwxqjzejg"\
    --form "npwp_number=apthehahtlooihl"\
    --form "siup_number=blidqriidtcjz"\
    --form "logo=@/tmp/phpBdOnST" \
    --form "banner=@/tmp/phpxIbMGp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants"
);

const headers = {
    "Authorization": "Bearer Daf5kV36adeZc1v4hg6E8Pb",
    "Accept": "application/json",
    "Content-Type": "multipart/form-data",
};

const body = new FormData();
body.append('name', 'est');
body.append('address', 'ratione');
body.append('description', 'Quo sit maiores ut a a explicabo tenetur nam.');
body.append('notes', 'accusamus');
body.append('ktp_number', 'hrozfzsbwxqjzejg');
body.append('npwp_number', 'apthehahtlooihl');
body.append('siup_number', 'blidqriidtcjz');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer Daf5kV36adeZc1v4hg6E8Pb',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'multipart/form-data',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'est'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'ratione'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Quo sit maiores ut a a explicabo tenetur nam.'
            ],
            [
                'name' =&gt; 'notes',
                'contents' =&gt; 'accusamus'
            ],
            [
                'name' =&gt; 'ktp_number',
                'contents' =&gt; 'hrozfzsbwxqjzejg'
            ],
            [
                'name' =&gt; 'npwp_number',
                'contents' =&gt; 'apthehahtlooihl'
            ],
            [
                'name' =&gt; 'siup_number',
                'contents' =&gt; 'blidqriidtcjz'
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('/tmp/phpBdOnST', 'r')
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('/tmp/phpxIbMGp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants'
files = {
  'name': (None, 'est'),
  'address': (None, 'ratione'),
  'description': (None, 'Quo sit maiores ut a a explicabo tenetur nam.'),
  'notes': (None, 'accusamus'),
  'ktp_number': (None, 'hrozfzsbwxqjzejg'),
  'npwp_number': (None, 'apthehahtlooihl'),
  'siup_number': (None, 'blidqriidtcjz'),
  'logo': open('/tmp/phpBdOnST', 'rb'),
  'banner': open('/tmp/phpxIbMGp', 'rb')}
payload = {
    "name": "est",
    "address": "ratione",
    "description": "Quo sit maiores ut a a explicabo tenetur nam.",
    "notes": "accusamus",
    "ktp_number": "hrozfzsbwxqjzejg",
    "npwp_number": "apthehahtlooihl",
    "siup_number": "blidqriidtcjz"
}
headers = {
  'Authorization': 'Bearer Daf5kV36adeZc1v4hg6E8Pb',
  'Accept': 'application/json',
  'Content-Type': 'multipart/form-data'
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
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-merchants"
               value="Bearer Daf5kV36adeZc1v4hg6E8Pb"
               data-component="header">
    <br>
<p>Example: <code>Bearer Daf5kV36adeZc1v4hg6E8Pb</code></p>
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
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-merchants"
               value="est"
               data-component="body">
    <br>
<p>Example: <code>est</code></p>
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
<p>Must be a file. Must be an image. Example: <code>/tmp/phpBdOnST</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-merchants"
               value="ratione"
               data-component="body">
    <br>
<p>Example: <code>ratione</code></p>
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
<p>Must be a file. Must be an image. Example: <code>/tmp/phpxIbMGp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-merchants"
               value="Quo sit maiores ut a a explicabo tenetur nam."
               data-component="body">
    <br>
<p>Example: <code>Quo sit maiores ut a a explicabo tenetur nam.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="PUTapi-v1-merchants"
               value="accusamus"
               data-component="body">
    <br>
<p>Example: <code>accusamus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ktp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ktp_number"                data-endpoint="PUTapi-v1-merchants"
               value="hrozfzsbwxqjzejg"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>hrozfzsbwxqjzejg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>npwp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="npwp_number"                data-endpoint="PUTapi-v1-merchants"
               value="apthehahtlooihl"
               data-component="body">
    <br>
<p>Must be 15 characters. Example: <code>apthehahtlooihl</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>siup_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="siup_number"                data-endpoint="PUTapi-v1-merchants"
               value="blidqriidtcjz"
               data-component="body">
    <br>
<p>Must be 13 characters. Example: <code>blidqriidtcjz</code></p>
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1"
);

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1'
headers = {
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
x-ratelimit-remaining: 56
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Product retrieved successfully&quot;,
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
        &quot;created_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
        &quot;sub_category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;at&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/002277?text=voluptatem&quot;,
            &quot;product_category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;perferendis&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/007799?text=qui&quot;
            }
        },
        &quot;merchant&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;logo&quot;: &quot;https://picsum.photos/100/100&quot;,
            &quot;is_highlight&quot;: 0,
            &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;created_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;draft&quot;,
            &quot;color&quot;: &quot;Violet&quot;,
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
                    &quot;created_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;
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
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00bb77?text=possimus&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;ac&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/0055dd?text=laudantium&quot;
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

                    <h2 id="product-POSTapi-v1-merchants-products">Create new product.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-merchants-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/products" \
    --header "Authorization: Bearer 6k6P1ED83e4cdfVav5aZbhg" \
    --header "Accept: application/json" \
    --header "Content-Type: multipart/form-data" \
    --form "product_sub_category_id=1"\
    --form "city_id=1"\
    --form "product_status_id=1"\
    --form "name=Product name"\
    --form "description=Product description"\
    --form "duration_type=time"\
    --form "duration=3"\
    --form "start_date=2023-10-14"\
    --form "end_date=2023-10-17"\
    --form "price=100000"\
    --form "unit=per pack"\
    --form "discount=0"\
    --form "address=Jl. Test"\
    --form "coordinate=-6.8890653,109.1689806"\
    --form "max_person=10"\
    --form "min_person=1"\
    --form "note=ducimus"\
    --form "includes[]=est"\
    --form "excludes[]=ipsa"\
    --form "facilities[]=dolore"\
    --form "terms[]=vel"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "thumbnail=@/tmp/phpSwo1NN" \
    --form "images[]=@/tmp/php5BckA2" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/products"
);

const headers = {
    "Authorization": "Bearer 6k6P1ED83e4cdfVav5aZbhg",
    "Accept": "application/json",
    "Content-Type": "multipart/form-data",
};

const body = new FormData();
body.append('product_sub_category_id', '1');
body.append('city_id', '1');
body.append('product_status_id', '1');
body.append('name', 'Product name');
body.append('description', 'Product description');
body.append('duration_type', 'time');
body.append('duration', '3');
body.append('start_date', '2023-10-14');
body.append('end_date', '2023-10-17');
body.append('price', '100000');
body.append('unit', 'per pack');
body.append('discount', '0');
body.append('address', 'Jl. Test');
body.append('coordinate', '-6.8890653,109.1689806');
body.append('max_person', '10');
body.append('min_person', '1');
body.append('note', 'ducimus');
body.append('includes[]', 'est');
body.append('excludes[]', 'ipsa');
body.append('facilities[]', 'dolore');
body.append('terms[]', 'vel');
body.append('faqs', '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]');
body.append('schedules', '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]');
body.append('thumbnail', document.querySelector('input[name="thumbnail"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/products';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 6k6P1ED83e4cdfVav5aZbhg',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'multipart/form-data',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'product_sub_category_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'city_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'product_status_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Product name'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Product description'
            ],
            [
                'name' =&gt; 'duration_type',
                'contents' =&gt; 'time'
            ],
            [
                'name' =&gt; 'duration',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'start_date',
                'contents' =&gt; '2023-10-14'
            ],
            [
                'name' =&gt; 'end_date',
                'contents' =&gt; '2023-10-17'
            ],
            [
                'name' =&gt; 'price',
                'contents' =&gt; '100000'
            ],
            [
                'name' =&gt; 'unit',
                'contents' =&gt; 'per pack'
            ],
            [
                'name' =&gt; 'discount',
                'contents' =&gt; '0'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'Jl. Test'
            ],
            [
                'name' =&gt; 'coordinate',
                'contents' =&gt; '-6.8890653,109.1689806'
            ],
            [
                'name' =&gt; 'max_person',
                'contents' =&gt; '10'
            ],
            [
                'name' =&gt; 'min_person',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'note',
                'contents' =&gt; 'ducimus'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'est'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'ipsa'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; 'dolore'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'vel'
            ],
            [
                'name' =&gt; 'faqs',
                'contents' =&gt; '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'
            ],
            [
                'name' =&gt; 'schedules',
                'contents' =&gt; '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'
            ],
            [
                'name' =&gt; 'thumbnail',
                'contents' =&gt; fopen('/tmp/phpSwo1NN', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/php5BckA2', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/products'
files = {
  'product_sub_category_id': (None, '1'),
  'city_id': (None, '1'),
  'product_status_id': (None, '1'),
  'name': (None, 'Product name'),
  'description': (None, 'Product description'),
  'duration_type': (None, 'time'),
  'duration': (None, '3'),
  'start_date': (None, '2023-10-14'),
  'end_date': (None, '2023-10-17'),
  'price': (None, '100000'),
  'unit': (None, 'per pack'),
  'discount': (None, '0'),
  'address': (None, 'Jl. Test'),
  'coordinate': (None, '-6.8890653,109.1689806'),
  'max_person': (None, '10'),
  'min_person': (None, '1'),
  'note': (None, 'ducimus'),
  'includes[]': (None, 'est'),
  'excludes[]': (None, 'ipsa'),
  'facilities[]': (None, 'dolore'),
  'terms[]': (None, 'vel'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'thumbnail': open('/tmp/phpSwo1NN', 'rb'),
  'images[]': open('/tmp/php5BckA2', 'rb')}
payload = {
    "product_sub_category_id": 1,
    "city_id": 1,
    "product_status_id": 1,
    "name": "Product name",
    "description": "Product description",
    "duration_type": "time",
    "duration": 3,
    "start_date": "2023-10-14",
    "end_date": "2023-10-17",
    "price": 100000,
    "unit": "per pack",
    "discount": 0,
    "address": "Jl. Test",
    "coordinate": "-6.8890653,109.1689806",
    "max_person": 10,
    "min_person": 1,
    "note": "ducimus",
    "includes": [
        "est"
    ],
    "excludes": [
        "ipsa"
    ],
    "facilities": [
        "dolore"
    ],
    "terms": [
        "vel"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]"
}
headers = {
  'Authorization': 'Bearer 6k6P1ED83e4cdfVav5aZbhg',
  'Accept': 'application/json',
  'Content-Type': 'multipart/form-data'
}

response = requests.request('POST', url, headers=headers, files=files)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-merchants-products">
</span>
<span id="execution-results-POSTapi-v1-merchants-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-merchants-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-merchants-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-merchants-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-merchants-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-merchants-products" data-method="POST"
      data-path="api/v1/merchants/products"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-merchants-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-merchants-products"
                    onclick="tryItOut('POSTapi-v1-merchants-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-merchants-products"
                    onclick="cancelTryOut('POSTapi-v1-merchants-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-merchants-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/merchants/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-merchants-products"
               value="Bearer 6k6P1ED83e4cdfVav5aZbhg"
               data-component="header">
    <br>
<p>Example: <code>Bearer 6k6P1ED83e4cdfVav5aZbhg</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-merchants-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-merchants-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_sub_category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_sub_category_id"                data-endpoint="POSTapi-v1-merchants-products"
               value="1"
               data-component="body">
    <br>
<p>Product sub category id. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city_id"                data-endpoint="POSTapi-v1-merchants-products"
               value="1"
               data-component="body">
    <br>
<p>City id. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_status_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_status_id"                data-endpoint="POSTapi-v1-merchants-products"
               value="1"
               data-component="body">
    <br>
<p>Product status id. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-merchants-products"
               value="Product name"
               data-component="body">
    <br>
<p>Product name. Example: <code>Product name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-v1-merchants-products"
               value="Product description"
               data-component="body">
    <br>
<p>Product description. Example: <code>Product description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="duration_type"                data-endpoint="POSTapi-v1-merchants-products"
               value="time"
               data-component="body">
    <br>
<p>Product duration type. This field is required when <code>duration</code> is present. Example: <code>time</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>time</code></li> <li><code>date</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration"                data-endpoint="POSTapi-v1-merchants-products"
               value="3"
               data-component="body">
    <br>
<p>Product duration. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="POSTapi-v1-merchants-products"
               value="2023-10-14"
               data-component="body">
    <br>
<p>Product start date. Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2023-10-14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="POSTapi-v1-merchants-products"
               value="2023-10-17"
               data-component="body">
    <br>
<p>Product end date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>. Example: <code>2023-10-17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-v1-merchants-products"
               value="100000"
               data-component="body">
    <br>
<p>Product price. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="POSTapi-v1-merchants-products"
               value="per pack"
               data-component="body">
    <br>
<p>Product unit. Example: <code>per pack</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="discount"                data-endpoint="POSTapi-v1-merchants-products"
               value="0"
               data-component="body">
    <br>
<p>Product discount. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>thumbnail</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="thumbnail"                data-endpoint="POSTapi-v1-merchants-products"
               value=""
               data-component="body">
    <br>
<p>Product thumbnail. Must be a file. Must be an image. Example: <code>/tmp/phpSwo1NN</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-v1-merchants-products"
               value="Jl. Test"
               data-component="body">
    <br>
<p>Product address. Example: <code>Jl. Test</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>coordinate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="coordinate"                data-endpoint="POSTapi-v1-merchants-products"
               value="-6.8890653,109.1689806"
               data-component="body">
    <br>
<p>Product coordinate. Example: <code>-6.8890653,109.1689806</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_person</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_person"                data-endpoint="POSTapi-v1-merchants-products"
               value="10"
               data-component="body">
    <br>
<p>Product max person. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_person</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_person"                data-endpoint="POSTapi-v1-merchants-products"
               value="1"
               data-component="body">
    <br>
<p>Product min person. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="note"                data-endpoint="POSTapi-v1-merchants-products"
               value="ducimus"
               data-component="body">
    <br>
<p>Example: <code>ducimus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>includes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="includes[0]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
        <input type="text" style="display: none"
               name="includes[1]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excludes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="excludes[0]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
        <input type="text" style="display: none"
               name="excludes[1]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facilities</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="facilities[0]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
        <input type="text" style="display: none"
               name="facilities[1]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>terms</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="terms[0]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
        <input type="text" style="display: none"
               name="terms[1]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>faqs</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="faqs"                data-endpoint="POSTapi-v1-merchants-products"
               value="[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"
               data-component="body">
    <br>
<p>Product faqs. Must be a valid JSON string. Example: <code>[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>schedules</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="schedules"                data-endpoint="POSTapi-v1-merchants-products"
               value="[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"
               data-component="body">
    <br>
<p>Product schedules. Must be a valid JSON string. Example: <code>[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="POSTapi-v1-merchants-products"
               data-component="body">
    <br>
<p>Must be a file. Must be an image.</p>
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1/products" \
    --header "Authorization: Bearer abDf86k5dgcvaVPe346EZ1h" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1/products"
);

const headers = {
    "Authorization": "Bearer abDf86k5dgcvaVPe346EZ1h",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1/products';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer abDf86k5dgcvaVPe346EZ1h',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/merchants/1/products'
headers = {
  'Authorization': 'Bearer abDf86k5dgcvaVPe346EZ1h',
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
x-ratelimit-remaining: 54
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
            &quot;created_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-01T16:53:40.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;product 2&quot;,
            &quot;description&quot;: &quot;Lorem Ipsum&quot;,
            &quot;duration&quot;: 2,
            &quot;start_date&quot;: &quot;16/07/2023&quot;,
            &quot;end_date&quot;: &quot;18/07/2023&quot;,
            &quot;price&quot;: 9000000,
            &quot;unit&quot;: &quot;per pack&quot;,
            &quot;discount&quot;: null,
            &quot;thumbnail&quot;: &quot;http://127.0.0.1:8000/storage/products/thumbnail/h5JnvF6cxfOIWIBV5BzDyIELt3c1HaDIJIKFim2Z.jpg&quot;,
            &quot;address&quot;: &quot;Address product&quot;,
            &quot;coordinate&quot;: &quot;-6.8890653,109.1689806&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 2,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T01:52:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T01:52:42.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;product 3&quot;,
            &quot;description&quot;: &quot;Lorem Ipsum&quot;,
            &quot;duration&quot;: 2,
            &quot;start_date&quot;: &quot;16/07/2023&quot;,
            &quot;end_date&quot;: &quot;18/07/2023&quot;,
            &quot;price&quot;: 9000000,
            &quot;unit&quot;: &quot;per pack&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;http://127.0.0.1:8000/storage/products/thumbnail/eVdSCsDjKoLyZnoZ1i4Roj0STrmY6GU7gqJeIeq6.jpg&quot;,
            &quot;address&quot;: &quot;Address product&quot;,
            &quot;coordinate&quot;: &quot;-6.8890653,109.1689806&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 2,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T01:56:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T01:56:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;product 4&quot;,
            &quot;description&quot;: &quot;Lorem Ipsum&quot;,
            &quot;duration&quot;: 2,
            &quot;start_date&quot;: &quot;16/07/2023&quot;,
            &quot;end_date&quot;: &quot;18/07/2023&quot;,
            &quot;price&quot;: 9000000,
            &quot;unit&quot;: &quot;per pack&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;http://127.0.0.1:8000/storage/products/thumbnail/tOhOTbXzWbf5CUGni38lzYoCqZrZMUScdit1QM7a.jpg&quot;,
            &quot;address&quot;: &quot;Address product&quot;,
            &quot;coordinate&quot;: &quot;-6.8890653,109.1689806&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 2,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T02:03:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T02:03:51.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;product 5&quot;,
            &quot;description&quot;: &quot;Lorem Ipsum&quot;,
            &quot;duration&quot;: 2,
            &quot;start_date&quot;: &quot;16/07/2023&quot;,
            &quot;end_date&quot;: &quot;18/07/2023&quot;,
            &quot;price&quot;: 9000000,
            &quot;unit&quot;: &quot;per pack&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;http://127.0.0.1:8000/storage/products/thumbnail/02GoH379w26t5o8nKupUQ5QIPHFINp4aOcUL6fHZ.jpg&quot;,
            &quot;address&quot;: &quot;Address product&quot;,
            &quot;coordinate&quot;: &quot;-6.8890653,109.1689806&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 2,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T02:04:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T02:04:33.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/sPVWUM2c5Sb4dIhULgqMV12L2EmRRaJvbxVctPuQ.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:12:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:12:00.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/RAYf7yVoJOVEi2Mm5Z0UMkh6XuaOffSjjIDXPPIz.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:17:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:17:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/50lk2M4P02xTN8iQ8F23I9f7Bc0XE88aovwt4pUj.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:17:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:17:42.000000Z&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/W6AsHkIEj0Lij32LQFFGZ3OelWrTaP1JGYsgcirg.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:18:31.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:18:31.000000Z&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/JdCknGMdefcg9KRnNJYPHAGp0aQ1eqjyRfJMJumf.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:18:49.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:18:49.000000Z&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/Z9ngY1gO0WUi4y9P4ViaFwz7fOJLjwmwlDJiIUJm.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:19:07.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:19:07.000000Z&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/KMuCzhoXzSvgAAzix0YIjuGjzVq3ZX2x6kYP1gJm.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:19:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:19:18.000000Z&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/ZEJEAdURnipAYYjO8sw87KvRHtCVWYfkaUWntdkJ.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:19:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:19:43.000000Z&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Product name&quot;,
            &quot;description&quot;: &quot;Product description&quot;,
            &quot;duration&quot;: 3,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;18/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;person&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://127.0.0.1:8000/storage/products/thumbnail/DUhL7L5OnUKNuoxSapdhzd4LueTn0kf4FQpxfTTw.png&quot;,
            &quot;address&quot;: &quot;Product address&quot;,
            &quot;coordinate&quot;: &quot;Product coordinate&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:19:55.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-02T03:19:55.000000Z&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;product X&quot;,
            &quot;description&quot;: &quot;Lorem Ipsum whatt&quot;,
            &quot;duration&quot;: 2,
            &quot;start_date&quot;: &quot;16/07/2023&quot;,
            &quot;end_date&quot;: &quot;18/07/2023&quot;,
            &quot;price&quot;: 1000,
            &quot;unit&quot;: &quot;per pack&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;http://127.0.0.1:8000/storage/products/thumbnail/3V3Z1AMZbLPDMuTmDiLeACVjcf3KL58g8l5jktZJ.jpg&quot;,
            &quot;address&quot;: &quot;Address product&quot;,
            &quot;coordinate&quot;: &quot;-6.8890653,109.1689806&quot;,
            &quot;max_person&quot;: 8,
            &quot;min_person&quot;: 2,
            &quot;note&quot;: null,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-02T03:20:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-03T16:23:54.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=2&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 2,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/1/products&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 15,
        &quot;total&quot;: 28
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
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants--merchant--products"
               value="Bearer abDf86k5dgcvaVPe346EZ1h"
               data-component="header">
    <br>
<p>Example: <code>Bearer abDf86k5dgcvaVPe346EZ1h</code></p>
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

                    <h2 id="product-PUTapi-v1-products--product_id-">Update a product.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1" \
    --header "Authorization: Bearer 5agf8V6ZDPhE6e1d4av3bkc" \
    --header "Accept: application/json" \
    --header "Content-Type: multipart/form-data" \
    --form "product_sub_category_id=1"\
    --form "city_id=1"\
    --form "product_status_id=1"\
    --form "name=Product name"\
    --form "description=Product description"\
    --form "duration_type=time"\
    --form "duration=3"\
    --form "start_date=2023-10-14"\
    --form "end_date=2023-10-17"\
    --form "price=100000"\
    --form "unit=per pack"\
    --form "discount=0"\
    --form "address=Jl. Test"\
    --form "coordinate=-6.8890653,109.1689806"\
    --form "max_person=10"\
    --form "min_person=1"\
    --form "note=sed"\
    --form "includes[]=officiis"\
    --form "excludes[]=et"\
    --form "facilities[]=10"\
    --form "terms[]=et"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "saved_images[]=16"\
    --form "thumbnail=@/tmp/phpYSKGtW" \
    --form "images[]=@/tmp/phpBxbyfk" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer 5agf8V6ZDPhE6e1d4av3bkc",
    "Accept": "application/json",
    "Content-Type": "multipart/form-data",
};

const body = new FormData();
body.append('product_sub_category_id', '1');
body.append('city_id', '1');
body.append('product_status_id', '1');
body.append('name', 'Product name');
body.append('description', 'Product description');
body.append('duration_type', 'time');
body.append('duration', '3');
body.append('start_date', '2023-10-14');
body.append('end_date', '2023-10-17');
body.append('price', '100000');
body.append('unit', 'per pack');
body.append('discount', '0');
body.append('address', 'Jl. Test');
body.append('coordinate', '-6.8890653,109.1689806');
body.append('max_person', '10');
body.append('min_person', '1');
body.append('note', 'sed');
body.append('includes[]', 'officiis');
body.append('excludes[]', 'et');
body.append('facilities[]', '10');
body.append('terms[]', 'et');
body.append('faqs', '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]');
body.append('schedules', '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]');
body.append('saved_images[]', '16');
body.append('thumbnail', document.querySelector('input[name="thumbnail"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 5agf8V6ZDPhE6e1d4av3bkc',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'multipart/form-data',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'product_sub_category_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'city_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'product_status_id',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'Product name'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Product description'
            ],
            [
                'name' =&gt; 'duration_type',
                'contents' =&gt; 'time'
            ],
            [
                'name' =&gt; 'duration',
                'contents' =&gt; '3'
            ],
            [
                'name' =&gt; 'start_date',
                'contents' =&gt; '2023-10-14'
            ],
            [
                'name' =&gt; 'end_date',
                'contents' =&gt; '2023-10-17'
            ],
            [
                'name' =&gt; 'price',
                'contents' =&gt; '100000'
            ],
            [
                'name' =&gt; 'unit',
                'contents' =&gt; 'per pack'
            ],
            [
                'name' =&gt; 'discount',
                'contents' =&gt; '0'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'Jl. Test'
            ],
            [
                'name' =&gt; 'coordinate',
                'contents' =&gt; '-6.8890653,109.1689806'
            ],
            [
                'name' =&gt; 'max_person',
                'contents' =&gt; '10'
            ],
            [
                'name' =&gt; 'min_person',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'note',
                'contents' =&gt; 'sed'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'officiis'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; '10'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'faqs',
                'contents' =&gt; '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'
            ],
            [
                'name' =&gt; 'schedules',
                'contents' =&gt; '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'
            ],
            [
                'name' =&gt; 'saved_images[]',
                'contents' =&gt; '16'
            ],
            [
                'name' =&gt; 'thumbnail',
                'contents' =&gt; fopen('/tmp/phpYSKGtW', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/phpBxbyfk', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1'
files = {
  'product_sub_category_id': (None, '1'),
  'city_id': (None, '1'),
  'product_status_id': (None, '1'),
  'name': (None, 'Product name'),
  'description': (None, 'Product description'),
  'duration_type': (None, 'time'),
  'duration': (None, '3'),
  'start_date': (None, '2023-10-14'),
  'end_date': (None, '2023-10-17'),
  'price': (None, '100000'),
  'unit': (None, 'per pack'),
  'discount': (None, '0'),
  'address': (None, 'Jl. Test'),
  'coordinate': (None, '-6.8890653,109.1689806'),
  'max_person': (None, '10'),
  'min_person': (None, '1'),
  'note': (None, 'sed'),
  'includes[]': (None, 'officiis'),
  'excludes[]': (None, 'et'),
  'facilities[]': (None, '10'),
  'terms[]': (None, 'et'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'saved_images[]': (None, '16'),
  'thumbnail': open('/tmp/phpYSKGtW', 'rb'),
  'images[]': open('/tmp/phpBxbyfk', 'rb')}
payload = {
    "product_sub_category_id": 1,
    "city_id": 1,
    "product_status_id": 1,
    "name": "Product name",
    "description": "Product description",
    "duration_type": "time",
    "duration": 3,
    "start_date": "2023-10-14",
    "end_date": "2023-10-17",
    "price": 100000,
    "unit": "per pack",
    "discount": 0,
    "address": "Jl. Test",
    "coordinate": "-6.8890653,109.1689806",
    "max_person": 10,
    "min_person": 1,
    "note": "sed",
    "includes": [
        "officiis"
    ],
    "excludes": [
        "et"
    ],
    "facilities": [
        10
    ],
    "terms": [
        "et"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]",
    "saved_images": [
        16
    ]
}
headers = {
  'Authorization': 'Bearer 5agf8V6ZDPhE6e1d4av3bkc',
  'Accept': 'application/json',
  'Content-Type': 'multipart/form-data'
}

response = requests.request('PUT', url, headers=headers, files=files)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-products--product_id-">
</span>
<span id="execution-results-PUTapi-v1-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-products--product_id-" data-method="PUT"
      data-path="api/v1/products/{product_id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-products--product_id-"
                    onclick="tryItOut('PUTapi-v1-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-products--product_id-"
                    onclick="cancelTryOut('PUTapi-v1-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-products--product_id-"
               value="Bearer 5agf8V6ZDPhE6e1d4av3bkc"
               data-component="header">
    <br>
<p>Example: <code>Bearer 5agf8V6ZDPhE6e1d4av3bkc</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-products--product_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PUTapi-v1-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_sub_category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="product_sub_category_id"                data-endpoint="PUTapi-v1-products--product_id-"
               value="1"
               data-component="body">
    <br>
<p>Product sub category id. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="city_id"                data-endpoint="PUTapi-v1-products--product_id-"
               value="1"
               data-component="body">
    <br>
<p>City id. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_status_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="product_status_id"                data-endpoint="PUTapi-v1-products--product_id-"
               value="1"
               data-component="body">
    <br>
<p>Product status id. Example: <code>1</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>1</code></li> <li><code>2</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-products--product_id-"
               value="Product name"
               data-component="body">
    <br>
<p>Product name. Example: <code>Product name</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-products--product_id-"
               value="Product description"
               data-component="body">
    <br>
<p>Product description. Example: <code>Product description</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="duration_type"                data-endpoint="PUTapi-v1-products--product_id-"
               value="time"
               data-component="body">
    <br>
<p>Product duration type. This field is required when <code>duration</code> is present. Example: <code>time</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>time</code></li> <li><code>date</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration"                data-endpoint="PUTapi-v1-products--product_id-"
               value="3"
               data-component="body">
    <br>
<p>Product duration. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="PUTapi-v1-products--product_id-"
               value="2023-10-14"
               data-component="body">
    <br>
<p>Product start date. Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2023-10-14</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="PUTapi-v1-products--product_id-"
               value="2023-10-17"
               data-component="body">
    <br>
<p>Product end date. Must be a valid date in the format <code>Y-m-d</code>. Must be a date after or equal to <code>start_date</code>. Example: <code>2023-10-17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-v1-products--product_id-"
               value="100000"
               data-component="body">
    <br>
<p>Product price. Must be at least 0. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="PUTapi-v1-products--product_id-"
               value="per pack"
               data-component="body">
    <br>
<p>Product unit. Example: <code>per pack</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>discount</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="discount"                data-endpoint="PUTapi-v1-products--product_id-"
               value="0"
               data-component="body">
    <br>
<p>Product discount. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>thumbnail</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="thumbnail"                data-endpoint="PUTapi-v1-products--product_id-"
               value=""
               data-component="body">
    <br>
<p>Product thumbnail. Must be a file. Must be an image. Example: <code>/tmp/phpYSKGtW</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-products--product_id-"
               value="Jl. Test"
               data-component="body">
    <br>
<p>Product address. Example: <code>Jl. Test</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>coordinate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="coordinate"                data-endpoint="PUTapi-v1-products--product_id-"
               value="-6.8890653,109.1689806"
               data-component="body">
    <br>
<p>Product coordinate. Example: <code>-6.8890653,109.1689806</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>max_person</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="max_person"                data-endpoint="PUTapi-v1-products--product_id-"
               value="10"
               data-component="body">
    <br>
<p>Product max person. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_person</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_person"                data-endpoint="PUTapi-v1-products--product_id-"
               value="1"
               data-component="body">
    <br>
<p>Product min person. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="note"                data-endpoint="PUTapi-v1-products--product_id-"
               value="sed"
               data-component="body">
    <br>
<p>Example: <code>sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>includes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="includes[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="includes[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>excludes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="excludes[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="excludes[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>facilities</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="facilities[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="number" style="display: none"
               name="facilities[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>terms</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="terms[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="text" style="display: none"
               name="terms[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>faqs</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="faqs"                data-endpoint="PUTapi-v1-products--product_id-"
               value="[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"
               data-component="body">
    <br>
<p>Product faqs. Must be a valid JSON string. Example: <code>[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>schedules</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="schedules"                data-endpoint="PUTapi-v1-products--product_id-"
               value="[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"
               data-component="body">
    <br>
<p>Product schedules. Must be a valid JSON string. Example: <code>[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>
<p>Must be a file. Must be an image.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>saved_images</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="saved_images[0]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
        <input type="number" style="display: none"
               name="saved_images[1]"                data-endpoint="PUTapi-v1-products--product_id-"
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="product-DELETEapi-v1-products--product_id-">Delete a product.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1" \
    --header "Authorization: Bearer abPc463D15VfghdEv6eZak8" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer abPc463D15VfghdEv6eZak8",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer abPc463D15VfghdEv6eZak8',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/products/1'
headers = {
  'Authorization': 'Bearer abPc463D15VfghdEv6eZak8',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-products--product_id-">
</span>
<span id="execution-results-DELETEapi-v1-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-products--product_id-" data-method="DELETE"
      data-path="api/v1/products/{product_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-products--product_id-"
                    onclick="tryItOut('DELETEapi-v1-products--product_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-products--product_id-"
                    onclick="cancelTryOut('DELETEapi-v1-products--product_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-products--product_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-products--product_id-"
               value="Bearer abPc463D15VfghdEv6eZak8"
               data-component="header">
    <br>
<p>Example: <code>Bearer abPc463D15VfghdEv6eZak8</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-products--product_id-"
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
               step="any"               name="product_id"                data-endpoint="DELETEapi-v1-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/cities" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/cities"
);

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/cities';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/cities'
headers = {
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
x-ratelimit-remaining: 59
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;East Tevin&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/003322?text=architecto&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;West Wilson&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Port Theresaside&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00eecc?text=sunt&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;West Wilson&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;East Savannahfort&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0044cc?text=blanditiis&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;West Wilson&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Earnestinetown&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00cc00?text=unde&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Lake Thadtown&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Evalynfurt&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bbff?text=omnis&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Lake Thadtown&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Langworthville&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ccee?text=nostrum&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Lake Thadtown&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;South Kaelynstad&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0077ee?text=quae&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Willowbury&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Tevinport&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee00?text=aut&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Willowbury&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Fadelport&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/007755?text=illo&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Willowbury&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Tomasaside&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/001133?text=quasi&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Leannonchester&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Reynaland&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005500?text=ab&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Leannonchester&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;New Elizabeth&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0066ff?text=voluptates&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Leannonchester&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Nikkohaven&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0044ff?text=ut&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Ismaelborough&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;North Selena&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0066bb?text=atque&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Ismaelborough&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;South Kadechester&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/008833?text=reprehenderit&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;North Ismaelborough&quot;
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/provinces" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/provinces"
);

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/provinces';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/provinces'
headers = {
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
x-ratelimit-remaining: 58
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;West Wilson&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Bhutan&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Lake Thadtown&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Bhutan&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Willowbury&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Bhutan&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Leannonchester&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Bhutan&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;North Ismaelborough&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Bhutan&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
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
    --get "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/countries" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://paradiso-api-vikovanesta.vercel.app/api/api/v1/countries"
);

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/countries';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://paradiso-api-vikovanesta.vercel.app/api/api/v1/countries'
headers = {
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
x-ratelimit-remaining: 57
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Bhutan&quot;,
            &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/008844?text=cupiditate&quot;
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
