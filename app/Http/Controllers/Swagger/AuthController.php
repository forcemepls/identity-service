<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * 
 * @OA\Post(
 *     path="/api/login",
 *     summary="Авторизация",
 *     tags={"Identity"},
 * 
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(
 *                 property="email", 
 *                 type="string", 
 *                 example="test_mail@gmail.com"
 *             ),
 *             @OA\Property(
 *                 property="password", 
 *                 type="string", 
 *                 example="123456Pass"
 *             ),
 *         )
 *     ),
 * 
 *     @OA\Response(
 *         response=200,
 *         description="Успешная авторизация",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="success",
 *             ),
 *             @OA\Property(
 *                 property="user",
 *                 ref="#/components/schemas/User"
 *             ),
 *             @OA\Property(
 *                 property="authorisation",
 *                 type="object",
 *                 @OA\Property(
 *                     property="token",
 *                     type="string",
 *                     example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
 *                 ),
 *                 @OA\Property(
 *                     property="type",
 *                     type="string",
 *                     example="bearer"
 *                 )
 *             )
 *         )
 *     ),
 * 
 *     @OA\Response(
 *         response=401,
 *         description="Неверные учетные данные",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="error"
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Unauthorized"
 *             )
 *         )
 *     )
 * ),
 * 
 */
class AuthController extends Controller
{

}