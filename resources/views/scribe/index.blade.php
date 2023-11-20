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
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
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
                                                    <li class="tocify-item level-2" data-unique="merchant-GETapi-v1-merchants-me">
                                <a href="#merchant-GETapi-v1-merchants-me">Get merchant profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="merchant-PUTapi-v1-merchants">
                                <a href="#merchant-PUTapi-v1-merchants">Update merchant profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-order-item" class="tocify-header">
                <li class="tocify-item level-1" data-unique="order-item">
                    <a href="#order-item">Order Item</a>
                </li>
                                    <ul id="tocify-subheader-order-item" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="order-item-GETapi-v1-merchants-me-items">
                                <a href="#order-item-GETapi-v1-merchants-me-items">Get all merchant's order's items.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-item-GETapi-v1-items--item_id-">
                                <a href="#order-item-GETapi-v1-items--item_id-">Get order item details.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="order-item-PUTapi-v1-items--item_id-">
                                <a href="#order-item-PUTapi-v1-items--item_id-">Update order item status.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-product" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product">
                    <a href="#product">Product</a>
                </li>
                                    <ul id="tocify-subheader-product" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-GETapi-v1-merchants-me-products">
                                <a href="#product-GETapi-v1-merchants-me-products">Get all merchant's products.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-POSTapi-v1-merchants-products">
                                <a href="#product-POSTapi-v1-merchants-products">Create new product.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="product-GETapi-v1-products--product_id-">
                                <a href="#product-GETapi-v1-products--product_id-">Get product details.</a>
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
                    <ul id="tocify-header-review" class="tocify-header">
                <li class="tocify-item level-1" data-unique="review">
                    <a href="#review">Review</a>
                </li>
                                    <ul id="tocify-subheader-review" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="review-GETapi-v1-merchants-me-reviews">
                                <a href="#review-GETapi-v1-merchants-me-reviews">Get all merchant's reviews.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="review-PUTapi-v1-reviews--review_id-">
                                <a href="#review-PUTapi-v1-reviews--review_id-">Update review's reply.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-statistic" class="tocify-header">
                <li class="tocify-item level-1" data-unique="statistic">
                    <a href="#statistic">Statistic</a>
                </li>
                                    <ul id="tocify-subheader-statistic" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="statistic-GETapi-v1-merchants-me-statistic">
                                <a href="#statistic-GETapi-v1-merchants-me-statistic">Get merchant's statistic.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-transaction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transaction">
                    <a href="#transaction">Transaction</a>
                </li>
                                    <ul id="tocify-subheader-transaction" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transaction-GETapi-v1-merchants-me-transactions">
                                <a href="#transaction-GETapi-v1-merchants-me-transactions">Get all merchant's transactions.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaction-GETapi-v1-transactions--transaction_id-">
                                <a href="#transaction-GETapi-v1-transactions--transaction_id-">Get transaction details.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                        <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 20, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
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
    "http://127.0.0.1:8000/api/v1/auth" \
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
    "http://127.0.0.1:8000/api/v1/auth"
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
$url = 'http://127.0.0.1:8000/api/v1/auth';
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

url = 'http://127.0.0.1:8000/api/v1/auth'
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
    "http://127.0.0.1:8000/api/v1/logout" \
    --header "Authorization: Bearer e6gZV6vf5kE4a3d8DachbP1" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/logout"
);

const headers = {
    "Authorization": "Bearer e6gZV6vf5kE4a3d8DachbP1",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer e6gZV6vf5kE4a3d8DachbP1',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/logout'
headers = {
  'Authorization': 'Bearer e6gZV6vf5kE4a3d8DachbP1',
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
               value="Bearer e6gZV6vf5kE4a3d8DachbP1"
               data-component="header">
    <br>
<p>Example: <code>Bearer e6gZV6vf5kE4a3d8DachbP1</code></p>
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
    --get "http://127.0.0.1:8000/api/vMT!U12" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/vMT!U12"
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
$url = 'http://127.0.0.1:8000/api/vMT!U12';
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

url = 'http://127.0.0.1:8000/api/vMT!U12'
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
               value="vMT!U12"
               data-component="url">
    <br>
<p>Example: <code>vMT!U12</code></p>
            </div>
                    </form>

                <h1 id="merchant">Merchant</h1>

    

                                <h2 id="merchant-GETapi-v1-merchants-me">Get merchant profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me" \
    --header "Authorization: Bearer fdV8e1cahvZ4gkPE3656Dba" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me"
);

const headers = {
    "Authorization": "Bearer fdV8e1cahvZ4gkPE3656Dba",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer fdV8e1cahvZ4gkPE3656Dba',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me'
headers = {
  'Authorization': 'Bearer fdV8e1cahvZ4gkPE3656Dba',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me">
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
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Merchant profile retrieved successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;merchant&quot;,
        &quot;logo&quot;: &quot;https://picsum.photos/100/100&quot;,
        &quot;is_highlight&quot;: 0,
        &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
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
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/003399?text=molestias&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Accepted&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/000022?text=quia&quot;,
            &quot;color&quot;: &quot;#299790&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me" data-method="GET"
      data-path="api/v1/merchants/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me"
                    onclick="tryItOut('GETapi-v1-merchants-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me"
                    onclick="cancelTryOut('GETapi-v1-merchants-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me"
               value="Bearer fdV8e1cahvZ4gkPE3656Dba"
               data-component="header">
    <br>
<p>Example: <code>Bearer fdV8e1cahvZ4gkPE3656Dba</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
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
    "http://127.0.0.1:8000/api/v1/merchants" \
    --header "Authorization: Bearer k8cfd6b15VPDZaEhe3vag64" \
    --header "Accept: application/json" \
    --header "Content-Type: multipart/form-data" \
    --form "name=esse"\
    --form "address=dolor"\
    --form "description=Numquam accusantium ea doloremque et."\
    --form "notes=et"\
    --form "ktp_number=yulymkvfhrqdzqpu"\
    --form "npwp_number=kcspssjyawlbmiv"\
    --form "siup_number=ukoruodinrrhd"\
    --form "logo=@/tmp/php8VOjIp" \
    --form "banner=@/tmp/phpouc1fS" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants"
);

const headers = {
    "Authorization": "Bearer k8cfd6b15VPDZaEhe3vag64",
    "Accept": "application/json",
    "Content-Type": "multipart/form-data",
};

const body = new FormData();
body.append('name', 'esse');
body.append('address', 'dolor');
body.append('description', 'Numquam accusantium ea doloremque et.');
body.append('notes', 'et');
body.append('ktp_number', 'yulymkvfhrqdzqpu');
body.append('npwp_number', 'kcspssjyawlbmiv');
body.append('siup_number', 'ukoruodinrrhd');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer k8cfd6b15VPDZaEhe3vag64',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'multipart/form-data',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'esse'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'dolor'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Numquam accusantium ea doloremque et.'
            ],
            [
                'name' =&gt; 'notes',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'ktp_number',
                'contents' =&gt; 'yulymkvfhrqdzqpu'
            ],
            [
                'name' =&gt; 'npwp_number',
                'contents' =&gt; 'kcspssjyawlbmiv'
            ],
            [
                'name' =&gt; 'siup_number',
                'contents' =&gt; 'ukoruodinrrhd'
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('/tmp/php8VOjIp', 'r')
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('/tmp/phpouc1fS', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants'
files = {
  'name': (None, 'esse'),
  'address': (None, 'dolor'),
  'description': (None, 'Numquam accusantium ea doloremque et.'),
  'notes': (None, 'et'),
  'ktp_number': (None, 'yulymkvfhrqdzqpu'),
  'npwp_number': (None, 'kcspssjyawlbmiv'),
  'siup_number': (None, 'ukoruodinrrhd'),
  'logo': open('/tmp/php8VOjIp', 'rb'),
  'banner': open('/tmp/phpouc1fS', 'rb')}
payload = {
    "name": "esse",
    "address": "dolor",
    "description": "Numquam accusantium ea doloremque et.",
    "notes": "et",
    "ktp_number": "yulymkvfhrqdzqpu",
    "npwp_number": "kcspssjyawlbmiv",
    "siup_number": "ukoruodinrrhd"
}
headers = {
  'Authorization': 'Bearer k8cfd6b15VPDZaEhe3vag64',
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
               value="Bearer k8cfd6b15VPDZaEhe3vag64"
               data-component="header">
    <br>
<p>Example: <code>Bearer k8cfd6b15VPDZaEhe3vag64</code></p>
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
               value="esse"
               data-component="body">
    <br>
<p>Example: <code>esse</code></p>
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
<p>Must be a file. Example: <code>/tmp/php8VOjIp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-merchants"
               value="dolor"
               data-component="body">
    <br>
<p>Example: <code>dolor</code></p>
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
<p>Must be a file. Example: <code>/tmp/phpouc1fS</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-merchants"
               value="Numquam accusantium ea doloremque et."
               data-component="body">
    <br>
<p>Example: <code>Numquam accusantium ea doloremque et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="PUTapi-v1-merchants"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ktp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ktp_number"                data-endpoint="PUTapi-v1-merchants"
               value="yulymkvfhrqdzqpu"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>yulymkvfhrqdzqpu</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>npwp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="npwp_number"                data-endpoint="PUTapi-v1-merchants"
               value="kcspssjyawlbmiv"
               data-component="body">
    <br>
<p>Must be 15 characters. Example: <code>kcspssjyawlbmiv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>siup_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="siup_number"                data-endpoint="PUTapi-v1-merchants"
               value="ukoruodinrrhd"
               data-component="body">
    <br>
<p>Must be 13 characters. Example: <code>ukoruodinrrhd</code></p>
        </div>
        </form>

                <h1 id="order-item">Order Item</h1>

    

                                <h2 id="order-item-GETapi-v1-merchants-me-items">Get all merchant&#039;s order&#039;s items.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/items?quantity_min=2&amp;quantity_max=10&amp;start_date=2023-10-16&amp;end_date=2023-10-20&amp;order_by=updated_at&amp;order_direction=DESC&amp;page_size=15" \
    --header "Authorization: Bearer 43vdhe1agca5bk8Zf6D6VPE" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/items"
);

const params = {
    "quantity_min": "2",
    "quantity_max": "10",
    "start_date": "2023-10-16",
    "end_date": "2023-10-20",
    "order_by": "updated_at",
    "order_direction": "DESC",
    "page_size": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 43vdhe1agca5bk8Zf6D6VPE",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me/items';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 43vdhe1agca5bk8Zf6D6VPE',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'quantity_min' =&gt; '2',
            'quantity_max' =&gt; '10',
            'start_date' =&gt; '2023-10-16',
            'end_date' =&gt; '2023-10-20',
            'order_by' =&gt; 'updated_at',
            'order_direction' =&gt; 'DESC',
            'page_size' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/items'
params = {
  'quantity_min': '2',
  'quantity_max': '10',
  'start_date': '2023-10-16',
  'end_date': '2023-10-20',
  'order_by': 'updated_at',
  'order_direction': 'DESC',
  'page_size': '15',
}
headers = {
  'Authorization': 'Bearer 43vdhe1agca5bk8Zf6D6VPE',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me-items">
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
    &quot;data&quot;: [
        {
            &quot;id&quot;: 9,
            &quot;net_price&quot;: 687832,
            &quot;price&quot;: 700000,
            &quot;product_name&quot;: &quot;product&quot;,
            &quot;product_description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;start_date&quot;: &quot;22/10/2023&quot;,
            &quot;end_date&quot;: &quot;27/01/2022&quot;,
            &quot;quantity&quot;: 7,
            &quot;note&quot;: &quot;Aut aut at ullam vitae.&quot;,
            &quot;status&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;2&quot;,
                &quot;desciption&quot;: &quot;Rejected by merchant&quot;
            }
        },
        {
            &quot;id&quot;: 1,
            &quot;net_price&quot;: 200000,
            &quot;price&quot;: 200000,
            &quot;product_name&quot;: &quot;product&quot;,
            &quot;product_description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;17/10/2023&quot;,
            &quot;quantity&quot;: 2,
            &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;status&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;1&quot;,
                &quot;desciption&quot;: &quot;Confirmed by merchant&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/items?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/items?page=1&quot;,
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
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/items?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/items&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 2,
        &quot;total&quot;: 2
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me-items" data-method="GET"
      data-path="api/v1/merchants/me/items"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me-items"
                    onclick="tryItOut('GETapi-v1-merchants-me-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me-items"
                    onclick="cancelTryOut('GETapi-v1-merchants-me-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me/items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me-items"
               value="Bearer 43vdhe1agca5bk8Zf6D6VPE"
               data-component="header">
    <br>
<p>Example: <code>Bearer 43vdhe1agca5bk8Zf6D6VPE</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>quantity_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity_min"                data-endpoint="GETapi-v1-merchants-me-items"
               value="2"
               data-component="query">
    <br>
<p>Item minimum quantity Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>quantity_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity_max"                data-endpoint="GETapi-v1-merchants-me-items"
               value="10"
               data-component="query">
    <br>
<p>Item maximum quantity Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="GETapi-v1-merchants-me-items"
               value="2023-10-16"
               data-component="query">
    <br>
<p>Item minimum start date (Y-m-d) Example: <code>2023-10-16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="GETapi-v1-merchants-me-items"
               value="2023-10-20"
               data-component="query">
    <br>
<p>Item maximum end date (Y-m-d) Example: <code>2023-10-20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_by"                data-endpoint="GETapi-v1-merchants-me-items"
               value="updated_at"
               data-component="query">
    <br>
<p>Order by (default: updated_at) Example: <code>updated_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_direction"                data-endpoint="GETapi-v1-merchants-me-items"
               value="DESC"
               data-component="query">
    <br>
<p>Order direction (ASC or DESC) (default: DESC) Example: <code>DESC</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page_size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_size"                data-endpoint="GETapi-v1-merchants-me-items"
               value="15"
               data-component="query">
    <br>
<p>Page size (default: 15) Example: <code>15</code></p>
            </div>
                </form>

                    <h2 id="order-item-GETapi-v1-items--item_id-">Get order item details.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-items--item_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/items/1" \
    --header "Authorization: Bearer 6cfh1v4Ead6gP5DVk83aebZ" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/items/1"
);

const headers = {
    "Authorization": "Bearer 6cfh1v4Ead6gP5DVk83aebZ",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/items/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 6cfh1v4Ead6gP5DVk83aebZ',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/items/1'
headers = {
  'Authorization': 'Bearer 6cfh1v4Ead6gP5DVk83aebZ',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-items--item_id-">
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
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Item retrieved successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;net_price&quot;: 200000,
        &quot;price&quot;: 200000,
        &quot;product_name&quot;: &quot;product&quot;,
        &quot;product_description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;start_date&quot;: &quot;16/10/2023&quot;,
        &quot;end_date&quot;: &quot;17/10/2023&quot;,
        &quot;quantity&quot;: 2,
        &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;product&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;product&quot;,
            &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;duration&quot;: 1,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;17/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;unit&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
            &quot;address&quot;: &quot;Jl. Test&quot;,
            &quot;coordinate&quot;: &quot;123,123&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
        },
        &quot;transaction&quot;: {
            &quot;id&quot;: 1,
            &quot;invoice_number&quot;: &quot;INV/2021/10/1&quot;,
            &quot;item_total_price&quot;: 200000,
            &quot;item_total_net_price&quot;: 200000,
            &quot;total_voucher_price&quot;: 0,
            &quot;amount&quot;: 200000,
            &quot;status&quot;: {
                &quot;id&quot;: 50,
                &quot;name&quot;: null,
                &quot;description&quot;: &quot;Selesai&quot;
            }
        },
        &quot;status&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;1&quot;,
            &quot;desciption&quot;: &quot;Confirmed by merchant&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-items--item_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-items--item_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-items--item_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-items--item_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-items--item_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-items--item_id-" data-method="GET"
      data-path="api/v1/items/{item_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-items--item_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-items--item_id-"
                    onclick="tryItOut('GETapi-v1-items--item_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-items--item_id-"
                    onclick="cancelTryOut('GETapi-v1-items--item_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-items--item_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/items/{item_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-items--item_id-"
               value="Bearer 6cfh1v4Ead6gP5DVk83aebZ"
               data-component="header">
    <br>
<p>Example: <code>Bearer 6cfh1v4Ead6gP5DVk83aebZ</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-items--item_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="GETapi-v1-items--item_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the item. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="order-item-PUTapi-v1-items--item_id-">Update order item status.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-items--item_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/v1/items/1" \
    --header "Authorization: Bearer 1EacvaZV8hkedP3g66b45Df" \
    --header "Accept: application/json" \
    --header "Content-Type: application/json" \
    --data "{
    \"status_id\": \"2\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/items/1"
);

const headers = {
    "Authorization": "Bearer 1EacvaZV8hkedP3g66b45Df",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

let body = {
    "status_id": "2"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/items/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 1EacvaZV8hkedP3g66b45Df',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'status_id' =&gt; '2',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/items/1'
payload = {
    "status_id": "2"
}
headers = {
  'Authorization': 'Bearer 1EacvaZV8hkedP3g66b45Df',
  'Accept': 'application/json',
  'Content-Type': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-items--item_id-">
</span>
<span id="execution-results-PUTapi-v1-items--item_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-items--item_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-items--item_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-items--item_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-items--item_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-items--item_id-" data-method="PUT"
      data-path="api/v1/items/{item_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-items--item_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-items--item_id-"
                    onclick="tryItOut('PUTapi-v1-items--item_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-items--item_id-"
                    onclick="cancelTryOut('PUTapi-v1-items--item_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-items--item_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/items/{item_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-items--item_id-"
               value="Bearer 1EacvaZV8hkedP3g66b45Df"
               data-component="header">
    <br>
<p>Example: <code>Bearer 1EacvaZV8hkedP3g66b45Df</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-items--item_id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-v1-items--item_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>item_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="item_id"                data-endpoint="PUTapi-v1-items--item_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the item. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_id"                data-endpoint="PUTapi-v1-items--item_id-"
               value="2"
               data-component="body">
    <br>
<p>Example: <code>2</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>2</code></li> <li><code>3</code></li></ul>
        </div>
        </form>

                <h1 id="product">Product</h1>

    

                                <h2 id="product-GETapi-v1-merchants-me-products">Get all merchant&#039;s products.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/products?status_id=1&amp;category_id=1&amp;sub_category_id=1&amp;name=Prod&amp;duration=1&amp;start_date=2023-10-16&amp;end_date=2023-10-20&amp;price_min=50000&amp;price_max=1000000&amp;person_min=1&amp;person_max=20&amp;sort_by=updated_at&amp;sort_direction=DESC&amp;page_size=15" \
    --header "Authorization: Bearer P4d1b5gDe68vaE36VckfaZh" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/products"
);

const params = {
    "status_id": "1",
    "category_id": "1",
    "sub_category_id": "1",
    "name": "Prod",
    "duration": "1",
    "start_date": "2023-10-16",
    "end_date": "2023-10-20",
    "price_min": "50000",
    "price_max": "1000000",
    "person_min": "1",
    "person_max": "20",
    "sort_by": "updated_at",
    "sort_direction": "DESC",
    "page_size": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer P4d1b5gDe68vaE36VckfaZh",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me/products';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer P4d1b5gDe68vaE36VckfaZh',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'status_id' =&gt; '1',
            'category_id' =&gt; '1',
            'sub_category_id' =&gt; '1',
            'name' =&gt; 'Prod',
            'duration' =&gt; '1',
            'start_date' =&gt; '2023-10-16',
            'end_date' =&gt; '2023-10-20',
            'price_min' =&gt; '50000',
            'price_max' =&gt; '1000000',
            'person_min' =&gt; '1',
            'person_max' =&gt; '20',
            'sort_by' =&gt; 'updated_at',
            'sort_direction' =&gt; 'DESC',
            'page_size' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/products'
params = {
  'status_id': '1',
  'category_id': '1',
  'sub_category_id': '1',
  'name': 'Prod',
  'duration': '1',
  'start_date': '2023-10-16',
  'end_date': '2023-10-20',
  'price_min': '50000',
  'price_max': '1000000',
  'person_min': '1',
  'person_max': '20',
  'sort_by': 'updated_at',
  'sort_direction': 'DESC',
  'page_size': '15',
}
headers = {
  'Authorization': 'Bearer P4d1b5gDe68vaE36VckfaZh',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me-products">
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
            &quot;name&quot;: &quot;product&quot;,
            &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;duration&quot;: 1,
            &quot;start_date&quot;: &quot;16/10/2023&quot;,
            &quot;end_date&quot;: &quot;17/10/2023&quot;,
            &quot;price&quot;: 100000,
            &quot;unit&quot;: &quot;unit&quot;,
            &quot;discount&quot;: 0,
            &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
            &quot;address&quot;: &quot;Jl. Test&quot;,
            &quot;coordinate&quot;: &quot;123,123&quot;,
            &quot;max_person&quot;: 10,
            &quot;min_person&quot;: 1,
            &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;is_published&quot;: 0,
            &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/products?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/products?page=1&quot;,
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
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/products&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me-products" data-method="GET"
      data-path="api/v1/merchants/me/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me-products"
                    onclick="tryItOut('GETapi-v1-merchants-me-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me-products"
                    onclick="cancelTryOut('GETapi-v1-merchants-me-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me-products"
               value="Bearer P4d1b5gDe68vaE36VckfaZh"
               data-component="header">
    <br>
<p>Example: <code>Bearer P4d1b5gDe68vaE36VckfaZh</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_id"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1"
               data-component="query">
    <br>
<p>Product status ID Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1"
               data-component="query">
    <br>
<p>Category ID Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sub_category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sub_category_id"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1"
               data-component="query">
    <br>
<p>Sub Category ID Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-v1-merchants-me-products"
               value="Prod"
               data-component="query">
    <br>
<p>Product name (fuzzy search) Example: <code>Prod</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="duration"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1"
               data-component="query">
    <br>
<p>Product duration Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>start_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="start_date"                data-endpoint="GETapi-v1-merchants-me-products"
               value="2023-10-16"
               data-component="query">
    <br>
<p>Product minimum start date (Y-m-d) Example: <code>2023-10-16</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>end_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="end_date"                data-endpoint="GETapi-v1-merchants-me-products"
               value="2023-10-20"
               data-component="query">
    <br>
<p>Product maximum end date (Y-m-d) Example: <code>2023-10-20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>price_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price_min"                data-endpoint="GETapi-v1-merchants-me-products"
               value="50000"
               data-component="query">
    <br>
<p>Product minimum price Example: <code>50000</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>price_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price_max"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1000000"
               data-component="query">
    <br>
<p>Product maximum price Example: <code>1000000</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>person_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="person_min"                data-endpoint="GETapi-v1-merchants-me-products"
               value="1"
               data-component="query">
    <br>
<p>Product minimum person Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>person_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="person_max"                data-endpoint="GETapi-v1-merchants-me-products"
               value="20"
               data-component="query">
    <br>
<p>Product maximum person Example: <code>20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-v1-merchants-me-products"
               value="updated_at"
               data-component="query">
    <br>
<p>Sort by (default: updated_at) Example: <code>updated_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort_direction"                data-endpoint="GETapi-v1-merchants-me-products"
               value="DESC"
               data-component="query">
    <br>
<p>Sort direction (ASC or DESC) (default: DESC) Example: <code>DESC</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page_size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_size"                data-endpoint="GETapi-v1-merchants-me-products"
               value="15"
               data-component="query">
    <br>
<p>Page size (default: 15) Example: <code>15</code></p>
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
    "http://127.0.0.1:8000/api/v1/merchants/products" \
    --header "Authorization: Bearer 1aa4b3e5PfZDg6V6v8kEhcd" \
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
    --form "note=ut"\
    --form "includes[]=et"\
    --form "excludes[]=aliquid"\
    --form "facilities[]=totam"\
    --form "terms[]=doloremque"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "thumbnail=@/tmp/phpapsyb4" \
    --form "images[]=@/tmp/phplGsgeA" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/products"
);

const headers = {
    "Authorization": "Bearer 1aa4b3e5PfZDg6V6v8kEhcd",
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
body.append('note', 'ut');
body.append('includes[]', 'et');
body.append('excludes[]', 'aliquid');
body.append('facilities[]', 'totam');
body.append('terms[]', 'doloremque');
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
$url = 'http://127.0.0.1:8000/api/v1/merchants/products';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 1aa4b3e5PfZDg6V6v8kEhcd',
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
                'contents' =&gt; 'ut'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'aliquid'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; 'totam'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'doloremque'
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
                'contents' =&gt; fopen('/tmp/phpapsyb4', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/phplGsgeA', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/products'
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
  'note': (None, 'ut'),
  'includes[]': (None, 'et'),
  'excludes[]': (None, 'aliquid'),
  'facilities[]': (None, 'totam'),
  'terms[]': (None, 'doloremque'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'thumbnail': open('/tmp/phpapsyb4', 'rb'),
  'images[]': open('/tmp/phplGsgeA', 'rb')}
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
    "note": "ut",
    "includes": [
        "et"
    ],
    "excludes": [
        "aliquid"
    ],
    "facilities": [
        "totam"
    ],
    "terms": [
        "doloremque"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]"
}
headers = {
  'Authorization': 'Bearer 1aa4b3e5PfZDg6V6v8kEhcd',
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
               value="Bearer 1aa4b3e5PfZDg6V6v8kEhcd"
               data-component="header">
    <br>
<p>Example: <code>Bearer 1aa4b3e5PfZDg6V6v8kEhcd</code></p>
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
<p>Product thumbnail. Must be a file. Example: <code>/tmp/phpapsyb4</code></p>
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
               value="ut"
               data-component="body">
    <br>
<p>Example: <code>ut</code></p>
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
<p>Must be a file.</p>
        </div>
        </form>

                    <h2 id="product-GETapi-v1-products--product_id-">Get product details.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/products/1" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/products/1"
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
$url = 'http://127.0.0.1:8000/api/v1/products/1';
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

url = 'http://127.0.0.1:8000/api/v1/products/1'
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
x-ratelimit-remaining: 50
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
        &quot;discount&quot;: 0,
        &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
        &quot;address&quot;: &quot;Jl. Test&quot;,
        &quot;coordinate&quot;: &quot;123,123&quot;,
        &quot;max_person&quot;: 10,
        &quot;min_person&quot;: 1,
        &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;is_published&quot;: 0,
        &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
        &quot;sub_category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;sed&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00bbee?text=nulla&quot;,
            &quot;product_category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;non&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/0033cc?text=non&quot;
            }
        },
        &quot;merchant&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;logo&quot;: &quot;https://picsum.photos/100/100&quot;,
            &quot;is_highlight&quot;: 0,
            &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;draft&quot;,
            &quot;color&quot;: &quot;PaleTurquoise&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/CCCCCC&quot;
        },
        &quot;city&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Kabupaten Aceh Barat&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ffbb?text=architecto&quot;,
            &quot;is_highlighted&quot;: 1
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
                &quot;reply&quot;: null,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;merchant&quot;,
                    &quot;user_level&quot;: 3,
                    &quot;email&quot;: &quot;merchant@mail.com&quot;,
                    &quot;phone&quot;: &quot;081234567890&quot;,
                    &quot;status&quot;: 1,
                    &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;review&quot;: &quot;Rerum natus dolore quis et nostrum explicabo. Facilis assumenda magnam dignissimos facilis nemo sit. Quibusdam suscipit quis asperiores dolorem. Doloremque eligendi eos in occaecati.&quot;,
                &quot;rating&quot;: 2,
                &quot;reply&quot;: null,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;merchant&quot;,
                    &quot;user_level&quot;: 3,
                    &quot;email&quot;: &quot;merchant@mail.com&quot;,
                    &quot;phone&quot;: &quot;081234567890&quot;,
                    &quot;status&quot;: 1,
                    &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 3,
                &quot;review&quot;: &quot;Hic at alias sit velit et et. Occaecati id ut expedita.&quot;,
                &quot;rating&quot;: 3,
                &quot;reply&quot;: null,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;merchant&quot;,
                    &quot;user_level&quot;: 3,
                    &quot;email&quot;: &quot;merchant@mail.com&quot;,
                    &quot;phone&quot;: &quot;081234567890&quot;,
                    &quot;status&quot;: 1,
                    &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
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
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/008899?text=impedit&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;ac&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00ddff?text=non&quot;
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

                    <h2 id="product-PUTapi-v1-products--product_id-">Update a product.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/v1/products/1" \
    --header "Authorization: Bearer vEhae5D3daf1cZ6g4kPb8V6" \
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
    --form "note=ut"\
    --form "includes[]=et"\
    --form "excludes[]=quidem"\
    --form "facilities[]=20"\
    --form "terms[]=dolore"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "saved_images[]=5"\
    --form "thumbnail=@/tmp/phpTknltL" \
    --form "images[]=@/tmp/phpvbtg3X" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer vEhae5D3daf1cZ6g4kPb8V6",
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
body.append('note', 'ut');
body.append('includes[]', 'et');
body.append('excludes[]', 'quidem');
body.append('facilities[]', '20');
body.append('terms[]', 'dolore');
body.append('faqs', '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]');
body.append('schedules', '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]');
body.append('saved_images[]', '5');
body.append('thumbnail', document.querySelector('input[name="thumbnail"]').files[0]);
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/products/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer vEhae5D3daf1cZ6g4kPb8V6',
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
                'contents' =&gt; 'ut'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'et'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'quidem'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; '20'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'dolore'
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
                'contents' =&gt; '5'
            ],
            [
                'name' =&gt; 'thumbnail',
                'contents' =&gt; fopen('/tmp/phpTknltL', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/phpvbtg3X', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/products/1'
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
  'note': (None, 'ut'),
  'includes[]': (None, 'et'),
  'excludes[]': (None, 'quidem'),
  'facilities[]': (None, '20'),
  'terms[]': (None, 'dolore'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'saved_images[]': (None, '5'),
  'thumbnail': open('/tmp/phpTknltL', 'rb'),
  'images[]': open('/tmp/phpvbtg3X', 'rb')}
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
    "note": "ut",
    "includes": [
        "et"
    ],
    "excludes": [
        "quidem"
    ],
    "facilities": [
        20
    ],
    "terms": [
        "dolore"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]",
    "saved_images": [
        5
    ]
}
headers = {
  'Authorization': 'Bearer vEhae5D3daf1cZ6g4kPb8V6',
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
               value="Bearer vEhae5D3daf1cZ6g4kPb8V6"
               data-component="header">
    <br>
<p>Example: <code>Bearer vEhae5D3daf1cZ6g4kPb8V6</code></p>
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
<p>Product duration. Must be at least 0. Example: <code>3</code></p>
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
<p>Product thumbnail. Must be a file. Example: <code>/tmp/phpTknltL</code></p>
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
<p>Product max person. Must be at least 0. Example: <code>10</code></p>
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
<p>Product min person. Must be at least 0. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="note"                data-endpoint="PUTapi-v1-products--product_id-"
               value="ut"
               data-component="body">
    <br>
<p>Example: <code>ut</code></p>
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
<p>Must be a file.</p>
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
    "http://127.0.0.1:8000/api/v1/products/1" \
    --header "Authorization: Bearer c6bDk18Pdfv4Eha36g5eVaZ" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer c6bDk18Pdfv4Eha36g5eVaZ",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/products/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer c6bDk18Pdfv4Eha36g5eVaZ',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/products/1'
headers = {
  'Authorization': 'Bearer c6bDk18Pdfv4Eha36g5eVaZ',
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
               value="Bearer c6bDk18Pdfv4Eha36g5eVaZ"
               data-component="header">
    <br>
<p>Example: <code>Bearer c6bDk18Pdfv4Eha36g5eVaZ</code></p>
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
    --get "http://127.0.0.1:8000/api/v1/cities?name=Ja" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/cities"
);

const params = {
    "name": "Ja",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/cities';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name' =&gt; 'Ja',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/cities'
params = {
  'name': 'Ja',
}
headers = {
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
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
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Kabupaten Aceh Jaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/006600?text=non&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Aceh&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Kabupaten Pidie Jaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aa33?text=inventore&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Aceh&quot;
            }
        },
        {
            &quot;id&quot;: 49,
            &quot;name&quot;: &quot;Kota Binjai&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aa00?text=eos&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Sumatra Utara&quot;
            }
        },
        {
            &quot;id&quot;: 71,
            &quot;name&quot;: &quot;Kota Padang Panjang&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/004499?text=enim&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Sumatra Barat&quot;
            }
        },
        {
            &quot;id&quot;: 92,
            &quot;name&quot;: &quot;Kabupaten Muaro Jambi&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0088dd?text=accusantium&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Jambi&quot;
            }
        },
        {
            &quot;id&quot;: 94,
            &quot;name&quot;: &quot;Kabupaten Tanjung Jabung Barat&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0011ee?text=consequuntur&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Jambi&quot;
            }
        },
        {
            &quot;id&quot;: 95,
            &quot;name&quot;: &quot;Kabupaten Tanjung Jabung Timur&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/009977?text=exercitationem&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Jambi&quot;
            }
        },
        {
            &quot;id&quot;: 97,
            &quot;name&quot;: &quot;Kota Jambi&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0088cc?text=quidem&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Jambi&quot;
            }
        },
        {
            &quot;id&quot;: 123,
            &quot;name&quot;: &quot;Kabupaten Rejang Lebong&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aaaa?text=aperiam&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Bengkulu&quot;
            }
        },
        {
            &quot;id&quot;: 156,
            &quot;name&quot;: &quot;Kota Jakarta Barat&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ffbb?text=pariatur&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Daerah Khusus Ibukota Jakarta&quot;
            }
        },
        {
            &quot;id&quot;: 157,
            &quot;name&quot;: &quot;Kota Jakarta Pusat&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aa88?text=laboriosam&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Daerah Khusus Ibukota Jakarta&quot;
            }
        },
        {
            &quot;id&quot;: 158,
            &quot;name&quot;: &quot;Kota Jakarta Selatan&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd00?text=facilis&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Daerah Khusus Ibukota Jakarta&quot;
            }
        },
        {
            &quot;id&quot;: 159,
            &quot;name&quot;: &quot;Kota Jakarta Timur&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/000033?text=consequatur&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Daerah Khusus Ibukota Jakarta&quot;
            }
        },
        {
            &quot;id&quot;: 160,
            &quot;name&quot;: &quot;Kota Jakarta Utara&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0033ff?text=et&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Daerah Khusus Ibukota Jakarta&quot;
            }
        },
        {
            &quot;id&quot;: 172,
            &quot;name&quot;: &quot;Kabupaten Majalengka&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bb33?text=quo&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Jawa Barat&quot;
            }
        },
        {
            &quot;id&quot;: 180,
            &quot;name&quot;: &quot;Kota Banjar&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/004422?text=voluptas&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Jawa Barat&quot;
            }
        },
        {
            &quot;id&quot;: 188,
            &quot;name&quot;: &quot;Kabupaten Banjarnegara&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00aaaa?text=amet&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 13,
                &quot;name&quot;: &quot;Jawa Tengah&quot;
            }
        },
        {
            &quot;id&quot;: 238,
            &quot;name&quot;: &quot;Kabupaten Lumajang&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00bb55?text=cum&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 15,
                &quot;name&quot;: &quot;Jawa Timur&quot;
            }
        },
        {
            &quot;id&quot;: 344,
            &quot;name&quot;: &quot;Kabupaten Banjar&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00eecc?text=a&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 22,
                &quot;name&quot;: &quot;Kalimantan Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 354,
            &quot;name&quot;: &quot;Kota Banjarbaru&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/002244?text=omnis&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 22,
                &quot;name&quot;: &quot;Kalimantan Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 355,
            &quot;name&quot;: &quot;Kota Banjarmasin&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0033cc?text=molestiae&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 22,
                &quot;name&quot;: &quot;Kalimantan Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 362,
            &quot;name&quot;: &quot;Kabupaten Penajam Paser Utara&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/008811?text=eos&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 23,
                &quot;name&quot;: &quot;Kalimantan Timur&quot;
            }
        },
        {
            &quot;id&quot;: 414,
            &quot;name&quot;: &quot;Kabupaten Sinjai&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd55?text=pariatur&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;Sulawesi Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 417,
            &quot;name&quot;: &quot;Kabupaten Tana Toraja&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee11?text=magni&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;Sulawesi Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 418,
            &quot;name&quot;: &quot;Kabupaten Toraja Utara&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/002211?text=voluptate&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 27,
                &quot;name&quot;: &quot;Sulawesi Selatan&quot;
            }
        },
        {
            &quot;id&quot;: 478,
            &quot;name&quot;: &quot;Kabupaten Intan Jaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/000033?text=nisi&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 479,
            &quot;name&quot;: &quot;Kabupaten Jayapura&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/003333?text=qui&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 480,
            &quot;name&quot;: &quot;Kabupaten Jayawijaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0077ee?text=impedit&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 483,
            &quot;name&quot;: &quot;Kabupaten Lanny Jaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/004455?text=veniam&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 494,
            &quot;name&quot;: &quot;Kabupaten Puncak Jaya&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ccff?text=qui&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 501,
            &quot;name&quot;: &quot;Kota Jayapura&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ffaa?text=illo&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Papua&quot;
            }
        },
        {
            &quot;id&quot;: 508,
            &quot;name&quot;: &quot;Kabupaten Raja Ampat&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/006655?text=deleniti&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 34,
                &quot;name&quot;: &quot;Papua Barat&quot;
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
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-v1-cities"
               value="Ja"
               data-component="query">
    <br>
<p>The name of the city. (can be a substring) Example: <code>Ja</code></p>
            </div>
                </form>

                    <h2 id="public-GETapi-v1-provinces">Get all provinces.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-provinces">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/provinces?name=Jawa" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/provinces"
);

const params = {
    "name": "Jawa",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/provinces';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name' =&gt; 'Jawa',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/provinces'
params = {
  'name': 'Jawa',
}
headers = {
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
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
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Jawa Barat&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Indonesia&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00cc44?text=qui&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Jawa Tengah&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Indonesia&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00cc44?text=qui&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Jawa Timur&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Indonesia&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00cc44?text=qui&quot;
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
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-v1-provinces"
               value="Jawa"
               data-component="query">
    <br>
<p>The name of the province. (can be a substring) Example: <code>Jawa</code></p>
            </div>
                </form>

                    <h2 id="public-GETapi-v1-countries">Get all countries.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-countries">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/countries?name=Ind" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/countries"
);

const params = {
    "name": "Ind",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/countries';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'name' =&gt; 'Ind',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/countries'
params = {
  'name': 'Ind',
}
headers = {
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
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
            &quot;name&quot;: &quot;Indonesia&quot;,
            &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00cc44?text=qui&quot;
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
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="GETapi-v1-countries"
               value="Ind"
               data-component="query">
    <br>
<p>The name of the country. (can be a substring) Example: <code>Ind</code></p>
            </div>
                </form>

                <h1 id="review">Review</h1>

    

                                <h2 id="review-GETapi-v1-merchants-me-reviews">Get all merchant&#039;s reviews.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/reviews?rating_min=2&amp;rating_max=5&amp;is_replied=1&amp;order_by=updated_at&amp;order_direction=DESC&amp;page_size=15" \
    --header "Authorization: Bearer vkZaeg53caEVDh61P68fbd4" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/reviews"
);

const params = {
    "rating_min": "2",
    "rating_max": "5",
    "is_replied": "1",
    "order_by": "updated_at",
    "order_direction": "DESC",
    "page_size": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer vkZaeg53caEVDh61P68fbd4",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me/reviews';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer vkZaeg53caEVDh61P68fbd4',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'rating_min' =&gt; '2',
            'rating_max' =&gt; '5',
            'is_replied' =&gt; '1',
            'order_by' =&gt; 'updated_at',
            'order_direction' =&gt; 'DESC',
            'page_size' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/reviews'
params = {
  'rating_min': '2',
  'rating_max': '5',
  'is_replied': '1',
  'order_by': 'updated_at',
  'order_direction': 'DESC',
  'page_size': '15',
}
headers = {
  'Authorization': 'Bearer vkZaeg53caEVDh61P68fbd4',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me-reviews">
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
    &quot;data&quot;: [],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: null,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/reviews?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/reviews&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: null,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me-reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me-reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me-reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me-reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me-reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me-reviews" data-method="GET"
      data-path="api/v1/merchants/me/reviews"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me-reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me-reviews"
                    onclick="tryItOut('GETapi-v1-merchants-me-reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me-reviews"
                    onclick="cancelTryOut('GETapi-v1-merchants-me-reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me-reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me-reviews"
               value="Bearer vkZaeg53caEVDh61P68fbd4"
               data-component="header">
    <br>
<p>Example: <code>Bearer vkZaeg53caEVDh61P68fbd4</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>rating_min</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating_min"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="2"
               data-component="query">
    <br>
<p>Review minimum rating Example: <code>2</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>rating_max</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating_max"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="5"
               data-component="query">
    <br>
<p>Review maximum rating Example: <code>5</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>is_replied</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="GETapi-v1-merchants-me-reviews" style="display: none">
            <input type="radio" name="is_replied"
                   value="1"
                   data-endpoint="GETapi-v1-merchants-me-reviews"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-merchants-me-reviews" style="display: none">
            <input type="radio" name="is_replied"
                   value="0"
                   data-endpoint="GETapi-v1-merchants-me-reviews"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Review is replied Example: <code>true</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_by"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="updated_at"
               data-component="query">
    <br>
<p>Order by (default: updated_at) Example: <code>updated_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_direction"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="DESC"
               data-component="query">
    <br>
<p>Order direction (ASC or DESC) (default: DESC) Example: <code>DESC</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page_size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_size"                data-endpoint="GETapi-v1-merchants-me-reviews"
               value="15"
               data-component="query">
    <br>
<p>Page size (default: 15) Example: <code>15</code></p>
            </div>
                </form>

                    <h2 id="review-PUTapi-v1-reviews--review_id-">Update review&#039;s reply.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-reviews--review_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/v1/reviews/1" \
    --header "Authorization: Bearer 64E16ZakDh5fbdP8cav3egV" \
    --header "Accept: application/json" \
    --header "Content-Type: application/json" \
    --data "{
    \"reply\": \"dolorum\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/reviews/1"
);

const headers = {
    "Authorization": "Bearer 64E16ZakDh5fbdP8cav3egV",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

let body = {
    "reply": "dolorum"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/reviews/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 64E16ZakDh5fbdP8cav3egV',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'reply' =&gt; 'dolorum',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/reviews/1'
payload = {
    "reply": "dolorum"
}
headers = {
  'Authorization': 'Bearer 64E16ZakDh5fbdP8cav3egV',
  'Accept': 'application/json',
  'Content-Type': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-reviews--review_id-">
</span>
<span id="execution-results-PUTapi-v1-reviews--review_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-reviews--review_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-reviews--review_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-reviews--review_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-reviews--review_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-reviews--review_id-" data-method="PUT"
      data-path="api/v1/reviews/{review_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-reviews--review_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-reviews--review_id-"
                    onclick="tryItOut('PUTapi-v1-reviews--review_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-reviews--review_id-"
                    onclick="cancelTryOut('PUTapi-v1-reviews--review_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-reviews--review_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/reviews/{review_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-reviews--review_id-"
               value="Bearer 64E16ZakDh5fbdP8cav3egV"
               data-component="header">
    <br>
<p>Example: <code>Bearer 64E16ZakDh5fbdP8cav3egV</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-reviews--review_id-"
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
                              name="Content-Type"                data-endpoint="PUTapi-v1-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="PUTapi-v1-reviews--review_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reply</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reply"                data-endpoint="PUTapi-v1-reviews--review_id-"
               value="dolorum"
               data-component="body">
    <br>
<p>Example: <code>dolorum</code></p>
        </div>
        </form>

                <h1 id="statistic">Statistic</h1>

    

                                <h2 id="statistic-GETapi-v1-merchants-me-statistic">Get merchant&#039;s statistic.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-statistic">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/statistic?product_time_range=week&amp;transaction_time_range=week" \
    --header "Authorization: Bearer ce6ak5dPa681VZfEvg3bD4h" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/statistic"
);

const params = {
    "product_time_range": "week",
    "transaction_time_range": "week",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer ce6ak5dPa681VZfEvg3bD4h",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me/statistic';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer ce6ak5dPa681VZfEvg3bD4h',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'product_time_range' =&gt; 'week',
            'transaction_time_range' =&gt; 'week',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/statistic'
params = {
  'product_time_range': 'week',
  'transaction_time_range': 'week',
}
headers = {
  'Authorization': 'Bearer ce6ak5dPa681VZfEvg3bD4h',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me-statistic">
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
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Merchant&#039;s statistic retrieved successfully.&quot;,
    &quot;data&quot;: {
        &quot;order_count_new&quot;: 6,
        &quot;order_count_pending&quot;: 1,
        &quot;review_count&quot;: 3,
        &quot;message_count_new&quot;: 0,
        &quot;income&quot;: &quot;in progress&quot;,
        &quot;store_statistic&quot;: {
            &quot;order_count_regular&quot;: &quot;in progress&quot;,
            &quot;message_count_responded&quot;: 0,
            &quot;message_count_replied&quot;: 0,
            &quot;store_count_verified&quot;: &quot;in progress&quot;,
            &quot;store_count_pinalty&quot;: &quot;in progress&quot;
        },
        &quot;product_statistic&quot;: {
            &quot;product_count&quot;: 1,
            &quot;product_count_sold&quot;: 2,
            &quot;product_view_count&quot;: 77,
            &quot;product_rating_avg&quot;: 3.5,
            &quot;conversion_rate&quot;: 0.03
        },
        &quot;transaction_statistic&quot;: {
            &quot;transaction_count&quot;: 5,
            &quot;transaction_count_success&quot;: 1,
            &quot;transaction_count_pending&quot;: 3,
            &quot;transaction_count_cancelled&quot;: 1
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me-statistic" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me-statistic"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me-statistic"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me-statistic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me-statistic">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me-statistic" data-method="GET"
      data-path="api/v1/merchants/me/statistic"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me-statistic', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me-statistic"
                    onclick="tryItOut('GETapi-v1-merchants-me-statistic');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me-statistic"
                    onclick="cancelTryOut('GETapi-v1-merchants-me-statistic');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me-statistic"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me/statistic</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me-statistic"
               value="Bearer ce6ak5dPa681VZfEvg3bD4h"
               data-component="header">
    <br>
<p>Example: <code>Bearer ce6ak5dPa681VZfEvg3bD4h</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me-statistic"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_time_range</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="product_time_range"                data-endpoint="GETapi-v1-merchants-me-statistic"
               value="week"
               data-component="query">
    <br>
<p>The time range of the product statistic. Example: <code>week</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>transaction_time_range</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="transaction_time_range"                data-endpoint="GETapi-v1-merchants-me-statistic"
               value="week"
               data-component="query">
    <br>
<p>The time range of the transaction statistic. Example: <code>week</code></p>
            </div>
                </form>

                <h1 id="transaction">Transaction</h1>

    

                                <h2 id="transaction-GETapi-v1-merchants-me-transactions">Get all merchant&#039;s transactions.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-transactions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/transactions?status_id=50&amp;order_by=updated_at&amp;order_direction=DESC&amp;page_size=15" \
    --header "Authorization: Bearer aaPgkDbvhd83V6c5Eef164Z" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/transactions"
);

const params = {
    "status_id": "50",
    "order_by": "updated_at",
    "order_direction": "DESC",
    "page_size": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer aaPgkDbvhd83V6c5Eef164Z",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/me/transactions';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer aaPgkDbvhd83V6c5Eef164Z',
            'Accept' =&gt; 'application/json',
        ],
        'query' =&gt; [
            'status_id' =&gt; '50',
            'order_by' =&gt; 'updated_at',
            'order_direction' =&gt; 'DESC',
            'page_size' =&gt; '15',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/transactions'
params = {
  'status_id': '50',
  'order_by': 'updated_at',
  'order_direction': 'DESC',
  'page_size': '15',
}
headers = {
  'Authorization': 'Bearer aaPgkDbvhd83V6c5Eef164Z',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-merchants-me-transactions">
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
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;invoice_number&quot;: &quot;INV/2021/10/1&quot;,
            &quot;item_total_price&quot;: 200000,
            &quot;item_total_net_price&quot;: 200000,
            &quot;total_voucher_price&quot;: 0,
            &quot;amount&quot;: 200000,
            &quot;status&quot;: {
                &quot;id&quot;: 50,
                &quot;name&quot;: null,
                &quot;description&quot;: &quot;Selesai&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1&quot;,
        &quot;last&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1&quot;,
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
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/transactions?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/v1/merchants/me/transactions&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-merchants-me-transactions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-merchants-me-transactions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-merchants-me-transactions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-merchants-me-transactions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-merchants-me-transactions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-merchants-me-transactions" data-method="GET"
      data-path="api/v1/merchants/me/transactions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-merchants-me-transactions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-merchants-me-transactions"
                    onclick="tryItOut('GETapi-v1-merchants-me-transactions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-merchants-me-transactions"
                    onclick="cancelTryOut('GETapi-v1-merchants-me-transactions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-merchants-me-transactions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/merchants/me/transactions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-merchants-me-transactions"
               value="Bearer aaPgkDbvhd83V6c5Eef164Z"
               data-component="header">
    <br>
<p>Example: <code>Bearer aaPgkDbvhd83V6c5Eef164Z</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-merchants-me-transactions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="status_id"                data-endpoint="GETapi-v1-merchants-me-transactions"
               value="50"
               data-component="query">
    <br>
<p>Transaction status ID Example: <code>50</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_by"                data-endpoint="GETapi-v1-merchants-me-transactions"
               value="updated_at"
               data-component="query">
    <br>
<p>Order by (default: updated_at) Example: <code>updated_at</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_direction</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="order_direction"                data-endpoint="GETapi-v1-merchants-me-transactions"
               value="DESC"
               data-component="query">
    <br>
<p>Order direction (ASC or DESC) (default: DESC) Example: <code>DESC</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page_size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_size"                data-endpoint="GETapi-v1-merchants-me-transactions"
               value="15"
               data-component="query">
    <br>
<p>Page size (default: 15) Example: <code>15</code></p>
            </div>
                </form>

                    <h2 id="transaction-GETapi-v1-transactions--transaction_id-">Get transaction details.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-transactions--transaction_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/transactions/1" \
    --header "Authorization: Bearer cZd3a48ePfb5VvDg61Ea6kh" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/transactions/1"
);

const headers = {
    "Authorization": "Bearer cZd3a48ePfb5VvDg61Ea6kh",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/transactions/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer cZd3a48ePfb5VvDg61Ea6kh',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/transactions/1'
headers = {
  'Authorization': 'Bearer cZd3a48ePfb5VvDg61Ea6kh',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-transactions--transaction_id-">
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
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Transaction retrieved successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;invoice_number&quot;: &quot;INV/2021/10/1&quot;,
        &quot;item_total_price&quot;: 200000,
        &quot;item_total_net_price&quot;: 200000,
        &quot;total_voucher_price&quot;: 0,
        &quot;amount&quot;: 200000,
        &quot;status&quot;: {
            &quot;id&quot;: 50,
            &quot;name&quot;: null,
            &quot;description&quot;: &quot;Selesai&quot;
        },
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;user_level&quot;: 3,
            &quot;email&quot;: &quot;merchant@mail.com&quot;,
            &quot;phone&quot;: &quot;081234567890&quot;,
            &quot;status&quot;: 1,
            &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
        },
        &quot;payments&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;payment_order&quot;: 2,
                &quot;amount&quot;: 200000,
                &quot;due_date&quot;: &quot;27/11/2023&quot;,
                &quot;response&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;payment_token&quot;: 1234567,
                &quot;created_at&quot;: &quot;20/11/2023 13:39:57&quot;,
                &quot;updated_at&quot;: &quot;20/11/2023 13:39:57&quot;,
                &quot;status&quot;: {
                    &quot;id&quot;: 1,
                    &quot;description&quot;: &quot;Success&quot;
                }
            }
        ],
        &quot;items&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;net_price&quot;: 200000,
                &quot;price&quot;: 200000,
                &quot;product_name&quot;: &quot;product&quot;,
                &quot;product_description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;start_date&quot;: &quot;16/10/2023&quot;,
                &quot;end_date&quot;: &quot;17/10/2023&quot;,
                &quot;quantity&quot;: 2,
                &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;product&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;product&quot;,
                    &quot;description&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                    &quot;duration&quot;: 1,
                    &quot;start_date&quot;: &quot;16/10/2023&quot;,
                    &quot;end_date&quot;: &quot;17/10/2023&quot;,
                    &quot;price&quot;: 100000,
                    &quot;unit&quot;: &quot;unit&quot;,
                    &quot;discount&quot;: 0,
                    &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
                    &quot;address&quot;: &quot;Jl. Test&quot;,
                    &quot;coordinate&quot;: &quot;123,123&quot;,
                    &quot;max_person&quot;: 10,
                    &quot;min_person&quot;: 1,
                    &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                    &quot;is_published&quot;: 0,
                    &quot;created_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-20T13:39:57.000000Z&quot;
                },
                &quot;status&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;1&quot;,
                    &quot;desciption&quot;: &quot;Confirmed by merchant&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-transactions--transaction_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-transactions--transaction_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-transactions--transaction_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-transactions--transaction_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-transactions--transaction_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-transactions--transaction_id-" data-method="GET"
      data-path="api/v1/transactions/{transaction_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-transactions--transaction_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-transactions--transaction_id-"
                    onclick="tryItOut('GETapi-v1-transactions--transaction_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-transactions--transaction_id-"
                    onclick="cancelTryOut('GETapi-v1-transactions--transaction_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-transactions--transaction_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/transactions/{transaction_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-transactions--transaction_id-"
               value="Bearer cZd3a48ePfb5VvDg61Ea6kh"
               data-component="header">
    <br>
<p>Example: <code>Bearer cZd3a48ePfb5VvDg61Ea6kh</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-transactions--transaction_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>transaction_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="transaction_id"                data-endpoint="GETapi-v1-transactions--transaction_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the transaction. Example: <code>1</code></p>
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
