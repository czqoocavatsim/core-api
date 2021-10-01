<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Membership\WebUserAccount
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property int|null $rating_id
 * @property string|null $rating_short
 * @property string|null $rating_long
 * @property string|null $rating_GRP
 * @property string|null $region_code
 * @property string|null $region_name
 * @property string|null $division_code
 * @property string|null $division_name
 * @property string|null $subdivision_code
 * @property string|null $subdivision_name
 * @property string $avatar
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $display_cid_only
 * @property string|null $display_fname
 * @property bool $display_last_name
 * @property int|null $discord_user_id
 * @property int|null $discord_dm_channel_id
 * @property int $avatar_mode
 * @property bool $used_connect
 * @property int $accepted_policies
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereAcceptedPolicies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereAvatarMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDiscordDmChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDiscordUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDisplayCidOnly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDisplayFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDisplayLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDivisionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRatingGRP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRatingLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRatingShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereSubdivisionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereSubdivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebUserAccount whereUsedConnect($value)
 * @mixin \Eloquent
 */
class WebUserAccount extends Model
{
    protected $connection = 'web';
    protected $table = 'users';


}

