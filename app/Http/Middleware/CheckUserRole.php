<?php

    namespace App\Http\Middleware;

    use Closure;
    use App\User;
    use App\RoleChecker;
    use Illuminate\Auth\Access\AuthorizationException;
    use Illuminate\Support\Facades\Auth;

    /**
     * Class CheckUserRole
     * @package App\Http\Middleware
     */
    class CheckUserRole
    {
        /**
         * @var RoleChecker
         */
        protected $roleChecker;

        public function __construct(RoleChecker $roleChecker)
        {
            $this->roleChecker = $roleChecker;
        }

        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure $next
         * @param string $role
         * @return mixed
         * @throws AuthorizationException
         */
        public function handle($request, Closure $next, $role)
        {
            /** @var User $user */
            $user = Auth::guard()->user();

            if(!is_null($user)){
                if ( ! $this->roleChecker->check($user, $role)) {
                    throw new AuthorizationException('You do not have permission to view this page');
                }
            }else{
                throw new AuthorizationException('You do not have permission to view this page');
            }

            return $next($request);
        }
    }