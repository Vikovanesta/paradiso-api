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
                                <a href="#product-GETapi-v1-merchants--merchant--products">Get all merchant's products.</a>
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
        <li>Last updated: November 8, 2023</li>
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
    --header "Authorization: Bearer 5v16h3Pdfe4aDacZb8gVkE6" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/logout"
);

const headers = {
    "Authorization": "Bearer 5v16h3Pdfe4aDacZb8gVkE6",
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
            'Authorization' =&gt; 'Bearer 5v16h3Pdfe4aDacZb8gVkE6',
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
  'Authorization': 'Bearer 5v16h3Pdfe4aDacZb8gVkE6',
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
               value="Bearer 5v16h3Pdfe4aDacZb8gVkE6"
               data-component="header">
    <br>
<p>Example: <code>Bearer 5v16h3Pdfe4aDacZb8gVkE6</code></p>
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
    --get "http://127.0.0.1:8000/api/mEY76wk" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/mEY76wk"
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
$url = 'http://127.0.0.1:8000/api/mEY76wk';
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

url = 'http://127.0.0.1:8000/api/mEY76wk'
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
x-ratelimit-remaining: 51
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
               value="mEY76wk"
               data-component="url">
    <br>
<p>Example: <code>mEY76wk</code></p>
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
    --get "http://127.0.0.1:8000/api/v1/merchants/1" \
    --header "Authorization: Bearer edfZPkhbaD4gvVc51E3686a" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/1"
);

const headers = {
    "Authorization": "Bearer edfZPkhbaD4gvVc51E3686a",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer edfZPkhbaD4gvVc51E3686a',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/1'
headers = {
  'Authorization': 'Bearer edfZPkhbaD4gvVc51E3686a',
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
x-ratelimit-remaining: 54
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
        &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
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
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/006622?text=rem&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Accepted&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/00eecc?text=et&quot;,
            &quot;color&quot;: &quot;#d454fd&quot;
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
               value="Bearer edfZPkhbaD4gvVc51E3686a"
               data-component="header">
    <br>
<p>Example: <code>Bearer edfZPkhbaD4gvVc51E3686a</code></p>
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
    "http://127.0.0.1:8000/api/v1/merchants" \
    --header "Authorization: Bearer 6ak4V8Dvcgd1beP6fa5hZE3" \
    --header "Accept: application/json" \
    --header "Content-Type: multipart/form-data" \
    --form "name=doloribus"\
    --form "address=deleniti"\
    --form "description=Blanditiis sequi est consequatur."\
    --form "notes=deserunt"\
    --form "ktp_number=ocqoghwocpehjmzk"\
    --form "npwp_number=rqzccorcqlcvkbp"\
    --form "siup_number=dcegdyvskcnhf"\
    --form "logo=@/tmp/phpqFvc5y" \
    --form "banner=@/tmp/phpD3i6ik" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants"
);

const headers = {
    "Authorization": "Bearer 6ak4V8Dvcgd1beP6fa5hZE3",
    "Accept": "application/json",
    "Content-Type": "multipart/form-data",
};

const body = new FormData();
body.append('name', 'doloribus');
body.append('address', 'deleniti');
body.append('description', 'Blanditiis sequi est consequatur.');
body.append('notes', 'deserunt');
body.append('ktp_number', 'ocqoghwocpehjmzk');
body.append('npwp_number', 'rqzccorcqlcvkbp');
body.append('siup_number', 'dcegdyvskcnhf');
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
            'Authorization' =&gt; 'Bearer 6ak4V8Dvcgd1beP6fa5hZE3',
            'Accept' =&gt; 'application/json',
            'Content-Type' =&gt; 'multipart/form-data',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'name',
                'contents' =&gt; 'doloribus'
            ],
            [
                'name' =&gt; 'address',
                'contents' =&gt; 'deleniti'
            ],
            [
                'name' =&gt; 'description',
                'contents' =&gt; 'Blanditiis sequi est consequatur.'
            ],
            [
                'name' =&gt; 'notes',
                'contents' =&gt; 'deserunt'
            ],
            [
                'name' =&gt; 'ktp_number',
                'contents' =&gt; 'ocqoghwocpehjmzk'
            ],
            [
                'name' =&gt; 'npwp_number',
                'contents' =&gt; 'rqzccorcqlcvkbp'
            ],
            [
                'name' =&gt; 'siup_number',
                'contents' =&gt; 'dcegdyvskcnhf'
            ],
            [
                'name' =&gt; 'logo',
                'contents' =&gt; fopen('/tmp/phpqFvc5y', 'r')
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('/tmp/phpD3i6ik', 'r')
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
  'name': (None, 'doloribus'),
  'address': (None, 'deleniti'),
  'description': (None, 'Blanditiis sequi est consequatur.'),
  'notes': (None, 'deserunt'),
  'ktp_number': (None, 'ocqoghwocpehjmzk'),
  'npwp_number': (None, 'rqzccorcqlcvkbp'),
  'siup_number': (None, 'dcegdyvskcnhf'),
  'logo': open('/tmp/phpqFvc5y', 'rb'),
  'banner': open('/tmp/phpD3i6ik', 'rb')}
payload = {
    "name": "doloribus",
    "address": "deleniti",
    "description": "Blanditiis sequi est consequatur.",
    "notes": "deserunt",
    "ktp_number": "ocqoghwocpehjmzk",
    "npwp_number": "rqzccorcqlcvkbp",
    "siup_number": "dcegdyvskcnhf"
}
headers = {
  'Authorization': 'Bearer 6ak4V8Dvcgd1beP6fa5hZE3',
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
               value="Bearer 6ak4V8Dvcgd1beP6fa5hZE3"
               data-component="header">
    <br>
<p>Example: <code>Bearer 6ak4V8Dvcgd1beP6fa5hZE3</code></p>
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
               value="doloribus"
               data-component="body">
    <br>
<p>Example: <code>doloribus</code></p>
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
<p>Must be a file. Example: <code>/tmp/phpqFvc5y</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-merchants"
               value="deleniti"
               data-component="body">
    <br>
<p>Example: <code>deleniti</code></p>
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
<p>Must be a file. Example: <code>/tmp/phpD3i6ik</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-v1-merchants"
               value="Blanditiis sequi est consequatur."
               data-component="body">
    <br>
<p>Example: <code>Blanditiis sequi est consequatur.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>notes</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="notes"                data-endpoint="PUTapi-v1-merchants"
               value="deserunt"
               data-component="body">
    <br>
<p>Example: <code>deserunt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ktp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ktp_number"                data-endpoint="PUTapi-v1-merchants"
               value="ocqoghwocpehjmzk"
               data-component="body">
    <br>
<p>Must be 16 characters. Example: <code>ocqoghwocpehjmzk</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>npwp_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="npwp_number"                data-endpoint="PUTapi-v1-merchants"
               value="rqzccorcqlcvkbp"
               data-component="body">
    <br>
<p>Must be 15 characters. Example: <code>rqzccorcqlcvkbp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>siup_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="siup_number"                data-endpoint="PUTapi-v1-merchants"
               value="dcegdyvskcnhf"
               data-component="body">
    <br>
<p>Must be 13 characters. Example: <code>dcegdyvskcnhf</code></p>
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
        &quot;discount&quot;: 0,
        &quot;thumbnail&quot;: &quot;https://picsum.photos/200/200&quot;,
        &quot;address&quot;: &quot;Jl. Test&quot;,
        &quot;coordinate&quot;: &quot;123,123&quot;,
        &quot;max_person&quot;: 10,
        &quot;min_person&quot;: 1,
        &quot;note&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
        &quot;is_published&quot;: 0,
        &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
        &quot;sub_category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;quia&quot;,
            &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/006688?text=deleniti&quot;,
            &quot;product_category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;iure&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/009966?text=vitae&quot;
            }
        },
        &quot;merchant&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;logo&quot;: &quot;https://picsum.photos/100/100&quot;,
            &quot;is_highlight&quot;: 0,
            &quot;notes&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
            &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;
        },
        &quot;status&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;draft&quot;,
            &quot;color&quot;: &quot;Yellow&quot;,
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
                    &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;
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
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/0088ee?text=sapiente&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;ac&quot;,
                &quot;icon&quot;: &quot;https://via.placeholder.com/640x480.png/0099aa?text=consequuntur&quot;
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
    "http://127.0.0.1:8000/api/v1/merchants/products" \
    --header "Authorization: Bearer PfhaeVg46d613kEcvZ58aDb" \
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
    --form "note=accusamus"\
    --form "includes[]=nostrum"\
    --form "excludes[]=consectetur"\
    --form "facilities[]=sit"\
    --form "terms[]=quasi"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "thumbnail=@/tmp/phpFUoTJW" \
    --form "images[]=@/tmp/phpv4uKgd" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/products"
);

const headers = {
    "Authorization": "Bearer PfhaeVg46d613kEcvZ58aDb",
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
body.append('note', 'accusamus');
body.append('includes[]', 'nostrum');
body.append('excludes[]', 'consectetur');
body.append('facilities[]', 'sit');
body.append('terms[]', 'quasi');
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
            'Authorization' =&gt; 'Bearer PfhaeVg46d613kEcvZ58aDb',
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
                'contents' =&gt; 'accusamus'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'nostrum'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'consectetur'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; 'sit'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'quasi'
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
                'contents' =&gt; fopen('/tmp/phpFUoTJW', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/phpv4uKgd', 'r')
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
  'note': (None, 'accusamus'),
  'includes[]': (None, 'nostrum'),
  'excludes[]': (None, 'consectetur'),
  'facilities[]': (None, 'sit'),
  'terms[]': (None, 'quasi'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'thumbnail': open('/tmp/phpFUoTJW', 'rb'),
  'images[]': open('/tmp/phpv4uKgd', 'rb')}
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
    "note": "accusamus",
    "includes": [
        "nostrum"
    ],
    "excludes": [
        "consectetur"
    ],
    "facilities": [
        "sit"
    ],
    "terms": [
        "quasi"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]"
}
headers = {
  'Authorization': 'Bearer PfhaeVg46d613kEcvZ58aDb',
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
               value="Bearer PfhaeVg46d613kEcvZ58aDb"
               data-component="header">
    <br>
<p>Example: <code>Bearer PfhaeVg46d613kEcvZ58aDb</code></p>
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
<p>Product thumbnail. Must be a file. Example: <code>/tmp/phpFUoTJW</code></p>
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
               value="accusamus"
               data-component="body">
    <br>
<p>Example: <code>accusamus</code></p>
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

                    <h2 id="product-GETapi-v1-merchants--merchant--products">Get all merchant&#039;s products.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants--merchant--products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/1/products" \
    --header "Authorization: Bearer 6b5fZ34cE8gekPDVv6da1ha" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/1/products"
);

const headers = {
    "Authorization": "Bearer 6b5fZ34cE8gekPDVv6da1ha",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/v1/merchants/1/products';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer 6b5fZ34cE8gekPDVv6da1ha',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/1/products'
headers = {
  'Authorization': 'Bearer 6b5fZ34cE8gekPDVv6da1ha',
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
x-ratelimit-remaining: 53
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Products retrieved successfully&quot;,
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
            &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;
        }
    ]
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
               value="Bearer 6b5fZ34cE8gekPDVv6da1ha"
               data-component="header">
    <br>
<p>Example: <code>Bearer 6b5fZ34cE8gekPDVv6da1ha</code></p>
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
    "http://127.0.0.1:8000/api/v1/products/1" \
    --header "Authorization: Bearer f16eaa6g4h5Pv3bVEdZk8cD" \
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
    --form "note=sint"\
    --form "includes[]=a"\
    --form "excludes[]=rerum"\
    --form "facilities[]=5"\
    --form "terms[]=nostrum"\
    --form "faqs=[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]"\
    --form "schedules=[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]"\
    --form "saved_images[]=12"\
    --form "thumbnail=@/tmp/phpvRK6nm" \
    --form "images[]=@/tmp/phpzXPNnR" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer f16eaa6g4h5Pv3bVEdZk8cD",
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
body.append('note', 'sint');
body.append('includes[]', 'a');
body.append('excludes[]', 'rerum');
body.append('facilities[]', '5');
body.append('terms[]', 'nostrum');
body.append('faqs', '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]');
body.append('schedules', '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]');
body.append('saved_images[]', '12');
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
            'Authorization' =&gt; 'Bearer f16eaa6g4h5Pv3bVEdZk8cD',
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
                'contents' =&gt; 'sint'
            ],
            [
                'name' =&gt; 'includes[]',
                'contents' =&gt; 'a'
            ],
            [
                'name' =&gt; 'excludes[]',
                'contents' =&gt; 'rerum'
            ],
            [
                'name' =&gt; 'facilities[]',
                'contents' =&gt; '5'
            ],
            [
                'name' =&gt; 'terms[]',
                'contents' =&gt; 'nostrum'
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
                'contents' =&gt; '12'
            ],
            [
                'name' =&gt; 'thumbnail',
                'contents' =&gt; fopen('/tmp/phpvRK6nm', 'r')
            ],
            [
                'name' =&gt; 'images[]',
                'contents' =&gt; fopen('/tmp/phpzXPNnR', 'r')
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
  'note': (None, 'sint'),
  'includes[]': (None, 'a'),
  'excludes[]': (None, 'rerum'),
  'facilities[]': (None, '5'),
  'terms[]': (None, 'nostrum'),
  'faqs': (None, '[{"question":"Question 1","answer":"Answer 1"},{"question":"Question 2","answer":"Answer 2"}]'),
  'schedules': (None, '[{"order":1,"title":"Day 1","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]},{"order":2,"title":"Day 2","days":[{"start_time":"08:00","end_time":"10:00","description":"Description 1"},{"start_time":"13:00","end_time":"14:00","description":"Description 2"}]}]'),
  'saved_images[]': (None, '12'),
  'thumbnail': open('/tmp/phpvRK6nm', 'rb'),
  'images[]': open('/tmp/phpzXPNnR', 'rb')}
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
    "note": "sint",
    "includes": [
        "a"
    ],
    "excludes": [
        "rerum"
    ],
    "facilities": [
        5
    ],
    "terms": [
        "nostrum"
    ],
    "faqs": "[{\"question\":\"Question 1\",\"answer\":\"Answer 1\"},{\"question\":\"Question 2\",\"answer\":\"Answer 2\"}]",
    "schedules": "[{\"order\":1,\"title\":\"Day 1\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]},{\"order\":2,\"title\":\"Day 2\",\"days\":[{\"start_time\":\"08:00\",\"end_time\":\"10:00\",\"description\":\"Description 1\"},{\"start_time\":\"13:00\",\"end_time\":\"14:00\",\"description\":\"Description 2\"}]}]",
    "saved_images": [
        12
    ]
}
headers = {
  'Authorization': 'Bearer f16eaa6g4h5Pv3bVEdZk8cD',
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
               value="Bearer f16eaa6g4h5Pv3bVEdZk8cD"
               data-component="header">
    <br>
<p>Example: <code>Bearer f16eaa6g4h5Pv3bVEdZk8cD</code></p>
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
<p>Product thumbnail. Must be a file. Example: <code>/tmp/phpvRK6nm</code></p>
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
               value="sint"
               data-component="body">
    <br>
<p>Example: <code>sint</code></p>
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
    --header "Authorization: Bearer 6ZeDbdh5Eg4PaaV16vc8f3k" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/products/1"
);

const headers = {
    "Authorization": "Bearer 6ZeDbdh5Eg4PaaV16vc8f3k",
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
            'Authorization' =&gt; 'Bearer 6ZeDbdh5Eg4PaaV16vc8f3k',
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
  'Authorization': 'Bearer 6ZeDbdh5Eg4PaaV16vc8f3k',
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
               value="Bearer 6ZeDbdh5Eg4PaaV16vc8f3k"
               data-component="header">
    <br>
<p>Example: <code>Bearer 6ZeDbdh5Eg4PaaV16vc8f3k</code></p>
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
    --get "http://127.0.0.1:8000/api/v1/cities" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/cities"
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
$url = 'http://127.0.0.1:8000/api/v1/cities';
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

url = 'http://127.0.0.1:8000/api/v1/cities'
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
            &quot;name&quot;: &quot;South Janis&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00cc00?text=architecto&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Landen&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Lunaburgh&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/002277?text=id&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Landen&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;East Valentinaview&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005544?text=facere&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Lake Landen&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;New Audieburgh&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/003377?text=veniam&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Annabelmouth&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;New Cecile&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/007766?text=adipisci&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Annabelmouth&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Timmothyview&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/002244?text=soluta&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Annabelmouth&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Lake Busterhaven&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd00?text=illum&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Ferrychester&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Mrazmouth&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00dd22?text=cum&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Ferrychester&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;West Oleta&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/000022?text=reiciendis&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Ferrychester&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;North Wilton&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/00ee44?text=enim&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Lake Kiarraside&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Hesselshire&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/007744?text=quis&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Lake Kiarraside&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Rogeliobury&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/005522?text=blanditiis&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Lake Kiarraside&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;New Kristin&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0011cc?text=ea&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Purdyside&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;New Erafurt&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/009977?text=inventore&quot;,
            &quot;is_highlighted&quot;: 0,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Purdyside&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Nataliechester&quot;,
            &quot;image&quot;: &quot;https://via.placeholder.com/640x480.png/0000dd?text=tempore&quot;,
            &quot;is_highlighted&quot;: 1,
            &quot;province&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Purdyside&quot;
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
    --get "http://127.0.0.1:8000/api/v1/provinces" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/provinces"
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
$url = 'http://127.0.0.1:8000/api/v1/provinces';
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

url = 'http://127.0.0.1:8000/api/v1/provinces'
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
            &quot;name&quot;: &quot;Lake Landen&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Grenada&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Annabelmouth&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Grenada&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Ferrychester&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Grenada&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Lake Kiarraside&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Grenada&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Purdyside&quot;,
            &quot;country&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Grenada&quot;,
                &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
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
    --get "http://127.0.0.1:8000/api/v1/countries" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/countries"
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
$url = 'http://127.0.0.1:8000/api/v1/countries';
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

url = 'http://127.0.0.1:8000/api/v1/countries'
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
            &quot;name&quot;: &quot;Grenada&quot;,
            &quot;flag&quot;: &quot;https://via.placeholder.com/640x480.png/00ffdd?text=labore&quot;
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

                <h1 id="transaction">Transaction</h1>

    

                                <h2 id="transaction-GETapi-v1-merchants-me-transactions">Get all merchant&#039;s transactions.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-merchants-me-transactions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/v1/merchants/me/transactions" \
    --header "Authorization: Bearer fb1h6ae538aEZ46DvVgcdPk" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/merchants/me/transactions"
);

const headers = {
    "Authorization": "Bearer fb1h6ae538aEZ46DvVgcdPk",
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
            'Authorization' =&gt; 'Bearer fb1h6ae538aEZ46DvVgcdPk',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'http://127.0.0.1:8000/api/v1/merchants/me/transactions'
headers = {
  'Authorization': 'Bearer fb1h6ae538aEZ46DvVgcdPk',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
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
x-ratelimit-remaining: 55
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;Transactions retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;invoice_number&quot;: &quot;INV/2021/10/1&quot;,
            &quot;item_total_price&quot;: 200000,
            &quot;item_total_net_price&quot;: 200000,
            &quot;total_voucher_price&quot;: 0,
            &quot;amount&quot;: 200000,
            &quot;status&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;50&quot;,
                &quot;description&quot;: &quot;Selesai&quot;
            }
        }
    ]
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
               value="Bearer fb1h6ae538aEZ46DvVgcdPk"
               data-component="header">
    <br>
<p>Example: <code>Bearer fb1h6ae538aEZ46DvVgcdPk</code></p>
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
    --header "Authorization: Bearer bdeaahDE43fvZg61PkcV856" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/transactions/1"
);

const headers = {
    "Authorization": "Bearer bdeaahDE43fvZg61PkcV856",
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
            'Authorization' =&gt; 'Bearer bdeaahDE43fvZg61PkcV856',
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
  'Authorization': 'Bearer bdeaahDE43fvZg61PkcV856',
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
x-ratelimit-remaining: 52
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
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;50&quot;,
            &quot;description&quot;: &quot;Selesai&quot;
        },
        &quot;user&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;merchant&quot;,
            &quot;user_level&quot;: 3,
            &quot;email&quot;: &quot;merchant@mail.com&quot;,
            &quot;phone&quot;: &quot;081234567890&quot;,
            &quot;status&quot;: 1,
            &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;
        },
        &quot;payments&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;payment_order&quot;: 2,
                &quot;amount&quot;: 200000,
                &quot;due_date&quot;: &quot;14/11/2023&quot;,
                &quot;response&quot;: &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.&quot;,
                &quot;payment_token&quot;: 1234567,
                &quot;created_at&quot;: &quot;07/11/2023 06:39:32&quot;,
                &quot;updated_at&quot;: &quot;07/11/2023 06:39:32&quot;,
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
                    &quot;created_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2023-11-07T06:39:32.000000Z&quot;
                },
                &quot;status&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;0&quot;,
                    &quot;desciption&quot;: &quot;Waiting for merchant confirmation&quot;
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
               value="Bearer bdeaahDE43fvZg61PkcV856"
               data-component="header">
    <br>
<p>Example: <code>Bearer bdeaahDE43fvZg61PkcV856</code></p>
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
