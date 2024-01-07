<?php

namespace app\controllers\Api;

use app\models\User;
use core\Controller;
use http\Exception;
use ReallySimpleJWT\Token;

class BaseApiController extends Controller
{
    public function before(string $action, array $params = []): bool
    {
        $requestToken = getToken();
        $user = User::find(authId());

        if (!Token::validate($requestToken, $user->password)){
            throw new \Exception('Не валідний токен',  422);
        }

        return true;
    }
}