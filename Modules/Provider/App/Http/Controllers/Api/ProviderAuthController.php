<?php

namespace Modules\Provider\App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Modules\Provider\App\Models\Provider;
use Symfony\Component\HttpFoundation\Response;

class ProviderAuthController extends Controller
{
    protected $providerAuthService;

    public function __construct()
    {

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required',  'unique:providers'],
            'password' => ['required', Password::min(8)->max(16)->letters()],
            'desc' => ['required', 'string', 'min:5'],
        ]);

        $provider = Provider::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'desc' => $validatedData['desc'],
        ]);

        //        $token = $provider->createToken("provider_token")->plainTextToken ;
        $data = ['Provider' => $provider];

        return response()->json($data, Response::HTTP_CREATED);
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $provider = Provider::where('email', $request->email)->first();

        if (! $provider || ! Hash::check($request->password, $provider->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $provider->createToken('provider_token')->plainTextToken;
        $data = ['message' => 'You Are Logged in successfully', 'token' => $token];

        return \response()->json($data, 200);

    }

    public function logout()
    {
        $user = Auth::guard('provider-api')->user();

        if ($user) {
            $user->tokens()->delete();

            return response()->json(['message' => 'User logged out successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
