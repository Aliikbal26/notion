<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    //
    public function login(): Response
    {
        return response()
            ->view("users.login", [
                "title" => "Login"
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate input
        if (empty($user) || empty($password)) {
            return response()->view("users.login", [
                "title" => "Login",
                "error" => "User or password is required"
            ]);
        }

        if ($this->userService->login($user, $password)) {
            $request->session()->put("user", $user);
            return redirect("/");
        }

        return response()->view("users.login", [
            "title" => "Login",
            "error" => "User or password is wrong"
        ]);
    }

    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget("user");
        return redirect("/");
    }

    public function profile()
    {
        $userId = Auth::id();
        $user = $this->userService->findUserById($userId);
        return view("users.profile", [
            "title" => "Profile $user->name",
            "user" => $user
        ]);
    }

    public function updateProfile(Request $request, string $userId)
    {

        $user = $this->userService->findUserById($userId);
        return view("users.updateUser", [
            "title" => "Profile",
            "user" => $user
        ]);
    }

    public function updateUser(Request $request, string $userId)
    {
        $name = $request->input('name');

        $this->userService->updateUser($userId, $name);
        return redirect()->action([UserController::class, 'profile'])->with("success", "Data Berhasil update !");
    }

    public function registrasi()
    {
        return view("users.registrasi", [
            "title" => "Registrasi",
        ]);
    }

    public function addUser(Request $request): Response|RedirectResponse
    {
        // Validasi berhasil, lakukan penyimpanan data
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($name)) {
            return response()->view("users.registrasi", [
                "title" => "Registrasi",
                "error" => "Name is required !"
            ]);
        } elseif (empty($email)) {
            return response()->view("users.registrasi", [
                "title" => "Registrasi",
                "error" => "Email is required !"
            ]);
        } elseif (empty($password)) {
            return response()->view("users.registrasi", [
                "title" => "Registrasi",
                "error" => "Password is required !"
            ]);
        } else {

            $this->userService->addUser($name, $email, $password);

            return redirect()->action([UserController::class, 'registrasi'])->with("success", "Registrasi Berhasil");
        }
    }
}
