# UI Map

This file maps the current RBAC-facing UI screens to their route, controller, and Blade file so the repo is faster to browse and update.

## Entry Landing

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| Root redirect | `/` | `routes/web.php` redirect | n/a | `routes/web.php` |
| Guest landing page | `/guest` | `App\Http\Controllers\guestController::guestPlace` | `user.guest.guestUser` | `resources/views/user/guest/guestUser.blade.php` |

## Guest / Public Auth UI

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| Login page | Laravel auth route | `App\Http\Controllers\Auth\AuthenticatedSessionController::create` | `Login.login` | `resources/views/Login/login.blade.php` |
| Register page | Laravel auth route | `App\Http\Controllers\Auth\RegisteredUserController::create` | `Login.register` | `resources/views/Login/register.blade.php` |
| Forgot password | Laravel auth route | `App\Http\Controllers\Auth\PasswordResetLinkController::create` | `auth.forgot-password` | `resources/views/auth/forgot-password.blade.php` |
| Reset password | Laravel auth route | `App\Http\Controllers\Auth\NewPasswordController::create` | `auth.reset-password` | `resources/views/auth/reset-password.blade.php` |
| Verify email | Laravel auth route | `App\Http\Controllers\Auth\EmailVerificationPromptController::__invoke` | `auth.verify-email` | `resources/views/auth/verify-email.blade.php` |
| Confirm password | Laravel auth route | `App\Http\Controllers\Auth\ConfirmablePasswordController::show` | `auth.confirm-password` | `resources/views/auth/confirm-password.blade.php` |

## User Role UI

Main layout:
`resources/views/user/layout/master.blade.php`

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| User dashboard | `/user/home` | `App\Http\Controllers\UserController::userhome` | `user.home.userDashboard` | `resources/views/user/home/userDashboard.blade.php` |
| Content page | `/content/show/contentPage/{find?}` | `App\Http\Controllers\ContentController::contentPage` | `user.home.contentPage` | `resources/views/user/home/contentPage.blade.php` |
| Edit profile | `/layout/editProfile` | `App\Http\Controllers\UserProfileController::editPage` | `user.home.editProfile` | `resources/views/user/home/editProfile.blade.php` |
| View profile | `/layout/profile` | `App\Http\Controllers\UserProfileController::profilePage` | `user.home.viewProfile` | `resources/views/user/home/viewProfile.blade.php` |
| Change password | `/layout/ChangePass` | `App\Http\Controllers\UserProfileController::ChPassPage` | `user.home.changePassword` | `resources/views/user/home/changePassword.blade.php` |
| Promote request page | `/layout/promote` | `App\Http\Controllers\UserProfileController::promotePage` | `user.home.toPromote` | `resources/views/user/home/toPromote.blade.php` |
| Suggestion page | `/layout/suggestion` | `App\Http\Controllers\UserProfileController::SuggestionPage` | `user.home.suggestion` | `resources/views/user/home/suggestion.blade.php` |

## Author Role UI

Note:
The repo uses the spelling `auther` in routes, directories, and controllers.

Main layout:
`resources/views/auther/layout/master.blade.php`

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| Author room shortcut | `/layout/auther/room` | `App\Http\Controllers\UserProfileController::autherRoom` | `auther.home.dashboard` | `resources/views/auther/home/dashboard.blade.php` |
| Playlist | `/auther/playlist` | `App\Http\Controllers\Auther\AutherProfileController::playlistPage` | `auther.home.playlist` | `resources/views/auther/home/playlist.blade.php` |
| Content list | `/auther/content` | `App\Http\Controllers\Auther\AutherProfileController::contentPage` | `auther.home.contents` | `resources/views/auther/home/contents.blade.php` |
| Comment inbox | `/auther/comment/{para?}` | `App\Http\Controllers\Auther\AutherProfileController::commentPage` | `auther.home.comment` | `resources/views/auther/home/comment.blade.php` |
| Create content | `/auther/createContent` | `App\Http\Controllers\Auther\AutherProfileController::createContentPage` | `auther.home.createContent` | `resources/views/auther/home/createContent.blade.php` |
| Create quiz | `/auther/createQuize` | `App\Http\Controllers\Auther\AutherProfileController::createQuizePage` | `auther.home.createQuize` | `resources/views/auther/home/createQuize.blade.php` |
| Create video content | `/auther/createVContent` | `App\Http\Controllers\Auther\AutherProfileController::createVContentPage` | `auther.home.createVContent` | `resources/views/auther/home/createVContent.blade.php` |
| Edit content | `/auther/editContent/{id}` | `App\Http\Controllers\Auther\AutherProfileController::editContentPage` | `auther.home.editContentPage` | `resources/views/auther/home/editContentPage.blade.php` |

## Admin Role UI

Main layout:
`resources/views/admin/layout/master.blade.php`

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| Admin dashboard | `/admins/page` | `App\Http\Controllers\Admin\AdminController::adminHome` | `admin.home.dashboard` | `resources/views/admin/home/dashboard.blade.php` |
| All users | `/admins/all/user` | `App\Http\Controllers\Admin\AdminController::allUser` | `admin.home.showAllUser` | `resources/views/admin/home/showAllUser.blade.php` |
| All authors | `/admins/all/author` | `App\Http\Controllers\Admin\AdminController::allAuthor` | `admin.home.showAlladmin` | `resources/views/admin/home/showAlladmin.blade.php` |
| Reports list | `/admins/user/report` | `App\Http\Controllers\Admin\AdminController::allReport` | `admin.home.showAllReport` | `resources/views/admin/home/showAllReport.blade.php` |
| Suggestions list | `/admins/user/suggest` | `App\Http\Controllers\Admin\AdminController::allSuggest` | `admin.home.showAllSuggest` | `resources/views/admin/home/showAllSuggest.blade.php` |
| Promotion requests | `/admins/requset/promo` | `App\Http\Controllers\Admin\AdminController::requestToPromo` | `admin.home.showAllRequestPromo` | `resources/views/admin/home/showAllRequestPromo.blade.php` |
| Reported content detail | `/admins/reportedContent/{id?}` | `App\Http\Controllers\Admin\AdminController::reportedContent` | `admin.home.reportedContentPage` | `resources/views/admin/home/reportedContentPage.blade.php` |
| Admin profile | `/profile/show` | `App\Http\Controllers\Admin\profileController::showProfile` | `admin.home.profile` | `resources/views/admin/home/profile.blade.php` |
| Category management | `/category/page` | `App\Http\Controllers\CategoryController::categoryPage` | `admin.category.categories` | `resources/views/admin/category/categories.blade.php` |

## Supporting Admin UI Files

These are admin-facing Blade files present in the repo and useful during browsing even when they are not the main target of the route map above:

| View | Directory |
| --- | --- |
| Announcement management | `resources/views/admin/announcement/announce.blade.php` |
| Report message view | `resources/views/admin/report/message.blade.php` |
| Reports panel | `resources/views/admin/report/reports.blade.php` |
| Promote-to-author page | `resources/views/admin/request/promoteToAuther.blade.php` |
| Admin account user list | `resources/views/admin/ShowAcc/User.blade.php` |
| Admin account author list | `resources/views/admin/ShowAcc/auther.blade.php` |

## Shared Profile / Breeze UI

These pages are still part of the repo and may be reached through Laravel's built-in authenticated profile flow:

| Area | Route | Controller | View | Directory |
| --- | --- | --- | --- | --- |
| Default dashboard | `/dashboard` | route closure | `dashboard` | `resources/views/dashboard.blade.php` |
| Breeze profile edit | `/profile` | `App\Http\Controllers\ProfileController::edit` | `profile.edit` | `resources/views/profile/edit.blade.php` |
| Shared app layout | shared | n/a | `layouts.app` | `resources/views/layouts/app.blade.php` |
| Shared guest layout | shared | n/a | `layouts.guest` | `resources/views/layouts/guest.blade.php` |

## Route Files

Use these first when tracing role-specific UI entry points:

| Purpose | Directory |
| --- | --- |
| Root and shared web entry | `routes/web.php` |
| User, guest, author, content routes | `routes/user.php` |
| Admin routes | `routes/admin.php` |
| Laravel auth routes | `routes/auth.php` |
