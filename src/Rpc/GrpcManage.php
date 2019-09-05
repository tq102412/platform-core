<?php


namespace Ineplant\Rpc;


use Manage\HiUser;
use Manage\ManageClient;

class GrpcManage extends GrpcClient {
    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return ManageClient::class;
    }

    protected static function getServAddName(): string {
        return "localhost:8080";
    }

    public static function hi($name, $sex) {
        $client = self::getClient(true);
        $client = new ManageClient('localhost:9502', [
            'credentials' => null,
        ]);
        $request = new HiUser();
        $request->setName($name);
        $request->setSex($sex);

        list($reply, $status) = $client->sayHello($request);
        $message = $reply->getMessage();
//        $user    = $reply->getUser();

//        $client->close();
        return $message;
    }
}