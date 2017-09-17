<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'API 1.0 Documenation';
$this->params['breadcrumbs'][] = $this->title;
$protocol="http";
//$api_host="yii2-rest.com";

?>
<!--
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
-->
<div>
    <h1 style="color:#1b809e;">REST API (V<?= Yii::$app->params['API_VERSION'] ?>)</h1>

    <p>The REST API lets you interact with the App from anything that can send an HTTP request. There are many things
        you can do with the REST API. For example:</p>
    <ul>
        <li>A mobile app can access App data.</li>
        <li>A webserver can show data from this App on a website.</li>
        <li>Applications written in any programming language can interact with data on this App.</li>
    </ul>
    <h3 style="color:#1b809e;">Quick Reference</h3>

    <p>
        All API access is over <b><?= strtoupper($protocol); ?></b>, and accessed via the
        <mark><?php echo $protocol . "://" . $api_host; ?></mark>
        domain.The relative path prefix <code>/<?= Yii::$app->params['API_VERSION'] ?>/</code> indicates that we are
        currently using <code>version <?= Yii::$app->params['API_VERSION'] ?></code> of the API.
    </p>
</div>

<h4 style="color:#1b809e;">Register/Signup</h4>
<div class="table-responsive">
    <table class="table">
        <tr class="info ">
            <th class="col-md-3">URL</th>
            <th class="col-md-2">HTTP Verb</th>
            <th class="col-md-4">Functionality</th>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/register</code></td>
            <td><strong>POST</strong></td>
            <td><a href="#register">Signup a user</a></td>
        </tr>
    </table>
</div>

<h4 style="color:#1b809e;">OAuth2.0</h4>
<div class="table-responsive">
    <table class="table col-md-9">
        <tr class="info">
            <th class="col-md-3">URL</th>
            <th class="col-md-2">HTTP Verb</th>
            <th class="col-md-4">Functionality</th>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/authorize</code></td>
            <td><strong>POST</strong></td>
            <td><a href="#authorizing_user">Authorizing User account</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/accesstoken</code></td>
            <td><strong>POST</strong></td>
            <td><a href="#obtain_access_token">Obtain Access token</a></td>
        </tr>
    </table>
</div>

<h4 style="color:#1b809e;">User</h4>
<div class="table-responsive">
    <table class="table">
        <tr class="info ">
            <th class="col-md-3">URL</th>
            <th class="col-md-2">HTTP Verb</th>
            <th class="col-md-4">Functionality</th>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/me</code></td>
            <td><strong>GET</strong></td>
            <td><a href="#me">Get User info.</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/logout</code></td>
            <td><strong>GET</strong></td>
            <td><a href="#logout">Logout User</a></td>
        </tr>
    </table>
</div>
<h4 style="color:#1b809e;"> Employees</h4>
<div class="table-responsive">
    <table class="table">
        <tr class="info ">
            <th class="col-md-3">URL</th>
            <th class="col-md-2">HTTP Verb</th>
            <th class="col-md-4">Functionality</th>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/employees</code></td>
            <td><strong>GET</strong></td>
            <td><a href="#list_employees">List Employees</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/employees/create</code></td>
            <td><strong>POST</strong></td>
            <td><a href="#create_employee">Create a new Employee</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/employees/update/&ltid&gt</code></td>
            <td><strong>PUT</strong></td>
            <td><a href="#update_employee">Update an Employee record</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/employees/view/&ltid&gt</code></td>
            <td><strong>GET</strong></td>
            <td><a href="#view_employee">View an Employee record</a></td>
        </tr>
        <tr>
            <td><code>/<?= Yii::$app->params['API_VERSION'] ?>/employees/delete/&ltid&gt</code></td>
            <td><strong>DELETE</strong></td>
            <td><a href="#delete_employee">Delete an Employee record</a></td>
        </tr>
    </table>
</div>

<div id="request_format">
    <h4 style="color:#1b809e;">Request format</h4>

    <p>For all POST/PUT requests the request body must contain a json body.

    </p>
    <pre>
        eg:
           {
             "username":"user123",
             "password":"password here"
           }
    </pre>
</div>
<div id="response_format">
    <h4 style="color:#1b809e;">Response format</h4>

    <p>The Response format for all the request is a JSON object.
        Whether a request succeeded is indicated by the HTTP status code.
        A 2xx status code indicates success, whereas a 4xx status code indicates failure.
        When a request fails, the response body is still JSON, but always contains the fields code and error which you
        can inspect to use for debugging.
        For example,
    </p>
    <h5 style="color:#1b809e;">Success Response format</h5>
    <pre>
      {
        "status": 1,
        "data": {
            "authorization_code": "191446c4d52b7d1e5878a947443cc928",
            "expires_at": 1430429516
        }
      }
    </pre>
    <h5 style="color:#1b809e;">Failed Response format</h5>
    <pre>
      {
        "status": 0,
        "error_code": 400,
        "errors": {
            "password": [
                "Incorrect username or password."
            ]
        }
     }
    </pre>
</div>
<div id="register">
    <h4 style="color:#1b809e;">Register/Signup a user</h4>

    <p>
        To Register/SignUp a new user account.
    </p>
    <h6>Request</h6>
      <pre>
      curl -X POST \
      <?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/register \
      -H 'content-type: application/json' \
      -d '{
      "username":"user123",
      "password":"pass123",
      "email":"user123@gmail.com"
    }'

    </pre>
    <h6>Response</h6>
    <pre>
      {
    "status": 1,
    "data": {
        "id": 5,
        "username": "user123",
        "email": "user123@gmail.com",
        "status": 10,
        "created_at": 1505615167,
        "updated_at": 1505615167
    }
}
        </pre>
</div>
<div id="authorizing_user">
    <h4 style="color:#1b809e;">Authorizing User account</h4>

    <p>
        To authorize a user account using their username & password.Send a POST
        request to the URL with the user informations then it will return an <b>Authorization
            token</b> which can be used to obtain an <b>access-token</b> for further API calls.
    </p>
    <pre>
    curl -X POST \
        <?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/authorize \
      -H 'content-type: application/json' \
      -d '{
      "username":"user123",
      "password":"pass123"
    }'
    </pre>
    <p>
        When the Authorization is successful,the HTTP response will be 200 OK with
        a JSON object containing a status element having a success value 1.

    <p>
    <pre>

        {
            "status": 1,
            "data": {
                "authorization_code": "eb9155aaea82d968046b01d3b9ae075f",
                "expires_at": 1430427799
                    }
        }

        </pre>

</div>
<div id="obtain_access_token">
    <h4 style="color:#1b809e;">Get Access token</h4>

    <p>
        To Obtain a new Acces token. Send a POST request with a parameter <b>authorization_code</b> obtained
        from the <code>/authorize</code> action.
    </p>
    <h6>Request</h6>
      <pre>
      curl -X POST \
          <?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/accesstoken \
      -H 'content-type: application/json' \
      -d '{
            "authorization_code": "376d4d0c24004aa638e1562b4d69e9c3"
         }'


    </pre>
    <h6>Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "access_token": "74191f2b7fb6da7e60be2d5bee345a8b",
                "expires_at": 1435665158
            }
        }
        </pre>
</div>
<div id="me">
    <h4 style="color:#1b809e;">Get User Info.</h4>

    <p>
        To get the User informations
    </p>
    <h6>Request</h6>
      <pre>
      curl -X GET \
     -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67" \
     -G  '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/me'

    </pre>
    <h6>Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "id": 5,
                "username": "user123",
                "email": "user123@gmail.com",
                "status": 10,
                "created_at": 1505615167,
                "updated_at": 1505615167
            }
        }
        </pre>
</div>

<div id="logout">
    <h4 style="color:#1b809e;">LogOut a user account</h4>

    <p>
        To LogOut a user account.

    </p>
    <h6>Request</h6>
      <pre>
    curl -X GET \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67" \
          -G  '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/logout'


    </pre>
    <h6>Response</h6>
    <pre>
        {
          "status": 1,
          "data": "Logged Out Successfully"
        }
        </pre>
</div>
<div id="list_employees">
    <h4 style="color:#1b809e;">List Employees</h4>

    <p>
        To List all employees

    </p>
    <h6>Request</h6>
      <pre>
    curl -X GET \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67" \
          -G  '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/employees'


    </pre>
    <code> Optional sort/filter params: page,limit,order,search[name],search[email],search[id]... etc</code>
    <h6>Response</h6>
    <pre>
        {
            "status": 1,
            "data": [
                {
                    "id": "3",
                    "name": "John ",
                    "email": "john@gmail.com",
                    "created_at": "2017-09-16 03:09:12",
                    "updated_at": "2017-09-16 15:51:25"
                },
                {
                    "id": "5",
                    "name": "sirin",
                    "email": "sirin@gmail.com",
                    "created_at": "2017-09-16 19:57:57",
                    "updated_at": "2017-09-16 19:57:57"
                },
                {
                    "id": "7",
                    "name": "sirin",
                    "email": "sirin3@gmail.com",
                    "created_at": "2017-09-16 19:58:38",
                    "updated_at": "2017-09-16 19:58:38"
                },
                {
                    "id": "8",
                    "name": "sirin",
                    "email": "sirin5@gmail.com",
                    "created_at": "2017-09-16 20:09:12",
                    "updated_at": "2017-09-16 20:10:08"
                }
            ],
            "page": 1,
            "size": 10,
            "totalCount": 4
        }
        </pre>
</div>
<div id="create_employee">
    <h4 style="color:#1b809e;">Create a new Employee</h4>

    <p>
        To Create a new Employee record
    </p>
    <h6>Request</h6>
      <pre>
    curl -X POST \
          '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/employees/create' \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67" \
          -H 'content-type: application/json' \
          -d '{
                  "name":"Christy",
                  "email":"christy@gmail.com"
             }'


    </pre>
    <h6>Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "id": 9,
                "name": "Christy",
                "email": "christy@gmail.com",
                "created_at": "2017-09-17 10:05:24",
                "updated_at": "2017-09-17 10:05:24"
            }
        }
        </pre>
</div>
<div id="update_employee">
    <h4 style="color:#1b809e;">Update an Employee record</h4>

    <p>
        To Update Employee record
    </p>
    <h6>Request</h6>
      <pre>
    curl -X PUT \
          '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/employees/update/9' \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67" \
          -H 'content-type: application/json' \
          -d '{
                  "name":"christy james",
                  "email":"christy@gmail.com"
             }'

    </pre>
    <h6>Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "id": 9,
                "name": "christy james",
                "email": "christy@gmail.com",
                "created_at": "2017-09-17 10:05:24",
                "updated_at": "2017-09-17 10:08:50"
            }
        }
        </pre>
</div>
<div id="view_employee">
    <h4 style="color:#1b809e;">View an empoloyee details</h4>

    <p>
        To view an empoloyee record.
    </p>
    <h6>Request</h6>
      <pre>
     curl -X GET \
          '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/employees/view/9' \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67"

    </pre>
    <h6>Success Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "id": 9,
                "name": "christy james",
                "email": "christy@gmail.com",
                "created_at": "2017-09-17 10:05:24",
                "updated_at": "2017-09-17 10:08:50"
            }
        }
        </pre>
</div>
<div id="delete_employee">
    <h4 style="color:#1b809e;">Delete an employee record</h4>

    <p>
        To Delete an employee record.<br/>
    </p>
    <h6>Request</h6>
      <pre>
   curl -X DELETE \
          '<?php echo $protocol . "://" . $api_host; ?>/<?= Yii::$app->params['API_VERSION'] ?>/employees/delete/9' \
          -H "X-Access-Token: 2dadd4bc51a15a41490cdce30383be67"
    </pre>
    <h6>Success Response</h6>
    <pre>
        {
            "status": 1,
            "data": {
                "id": 9,
                "name": "christy james",
                "email": "christy@gmail.com",
                "created_at": "2017-09-17 10:05:24",
                "updated_at": "2017-09-17 10:08:50"
            }
        }
        </pre>

</div>
