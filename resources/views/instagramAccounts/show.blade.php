@extends('layouts.clean')

@section('title', "Instagram data analysis for ".$scraped_data->full_name)
@section('meta_image', $scraped_data->profile_picture_url)

@section('meta_description', "This M Media tool will scan and quickly analyze your Instagram profile to provide you with suggestions on improving your Instagram strategy." )

@section('above_container')
    <div class="header-section" style="background:#246EBA;">
        <h1>{{$scraped_data->full_name}}</h1>
        <h2>Instagram data analyzer</h2>
    </div>
@endsection

@section('content')

    @if($scraped_data->is_private)
    <div class="alert alert-danger text-muted">
         Your Instagram account is private so we couldn't get all the information we need to debug your account.
    </div>
    @endif
    <h2 class="mt-5 mb-0">Account suggestions</h2>
    <p>M Media suggests the following actions to your account to improve your Instagram performance.</p>

    @if($scraped_data->is_private)
        <p class="mb-0 text-muted">To help M Media debug your account and reach more people:</p>
        <p class="mb-0">- Make your account public by switching off 'Private Account' in your Instagram settings</p>
        <p>- Subscribe to any <a href="/instagram">Instagram solution</a> and we'll do this for you</p>
    @endif

    @if(!$scraped_data->biography)
        <p class="mb-0 text-muted">To improve your account info:</p>
        <p class="mb-0">- Set a biography, or description, on your Instagram profile</p>
        <p>- Subscribe to any <a href="/instagram">Instagram solution</a> and we'll do this for you</p>
    @endif

    @if(isset($locations) && !$locations)
        <p class="mb-0 text-muted">To help your posts reach more people:</p>
        <p class="mb-0">- Tag locations on your Instagram posts</p>
        <p>- Subscribe to our <a href="/instagram-content-management">Instagram Content Management service</a> to implement this solution automatically</p>
    @endif

    @if(!$scraped_data->media_count || $scraped_data->media_count < 10)
        <p class="mb-0 text-muted">To grow your account:</p>
        <p class="mb-0">- You currently have {{$scraped_data->media_count}} posts on your profile. Consider adding more posts to grow your account</p>
        <p>- Subscribe to our <a href="/instagram-content-management">Instagram Content Management service</a> to implement this solution automatically</p>
    @endif

    @if(isset($hashtags) && (!$hashtags || count($hashtags) < 10))
        <p class="mb-0 text-muted">To aid your posts exposure:</p>
        <p class="mb-0">- In your recent posts, you've used {{count($hashtags)}} unique hashtags. Use at least 10 and a wider variety of them on each post to gain more exposure</p>
        <p>- Subscribe to our <a href="/instagram-content-management">Instagram Content Management service</a> to implement this solution automatically</p>
    @endif

    @if(!($scraped_data->followers_count) || $scraped_data->followers_count/$scraped_data->following_count <= 3)
        <p class="mb-0 text-muted">To improve your follower to following ratio:</p>
        <p class="mb-0">- Unfollow more people so that you have at least 3 followers for every person you follow</p>
        <p>- Subscribe to our <a href="/instagram-engagement">Instagram Engagement service</a> to implement this solution automatically</p>
    @endif

    @if(!$scraped_data->is_private && (!($scraped_data->avg_likes_count) || ($scraped_data->avg_likes_count/$scraped_data->followers_count) * 100 <= 5))
        <p class="mb-0 text-muted">To improve engagement health:</p>
        <p class="mb-0">- Use higher quality media posts that resonate better with your audience</p>
        <p class="mb-0">- Update the hashtags you use to hashtags that are more relevant to your users</p>
        @if($scraped_data->avg_dataset_end)
            <p class="mb-0">- Your last post was {{ \Carbon\Carbon::parse($scraped_data->avg_dataset_end)->diffForHumans()}}. Try altering your posting frequency and schedule for better engagement results</p>
        @else
            <p class="mb-0">- Your have not posted a post yet. Post your first picture or video for better engagement results</p>
        @endif
        <p>- Subscribe to our <a href="/instagram-content-management">Instagram Content Management service</a> to implement this solution automatically</p>
    @endif

    @if(!$scraped_data->external_url)
        <p class="mb-0 text-muted">To help get more people to your website:</p>
        <p class="mb-0">- Include a secure external URL, or a link to your website, on your Instagram profile. It's strongly suggested your link starts with 'https' rather than 'http'</p>
        <p>- Subscribe to any <a href="/instagram">M Media Instagram service</a> and we'll do this for you</p>
    @endif

    @if($scraped_data->followers_count <= 100 || $scraped_data->media_count < 3)
        <p class="mb-0 text-muted">To qualify for M Media Instagram services:</p>
        <p class="mb-0">- Post at least 3 posts on your Instagram account</p>
        <p class="mb-0">- Make sure your Instagram account is not set to private</p>
        <p>- Gain at least 100 followers by sharing your Instagram account with friends, family, and customers</p>
    @endif

    <h2 class="mt-5 mb-0">Account data</h2>
    <div class="table-responsive table-hover">
        <table class="table mb-0">
            <tbody>
                <tr>
                    <th>Username</th>
                    <td>{{ $scraped_data->username }}</td>
                </tr>
                <tr>
                    <th>Full name</th>
                    <td>{{ $scraped_data->full_name }}</td>
                </tr>
                <tr>
                    <th>Biography</th>
                    <td>{{$scraped_data->biography}}</td>
                </tr>
{{--                 <tr>
                    <th>Profile picture URL</th>
                    <td>{{$scraped_data->profile_picture_url}}</td>
                </tr> --}}
                <tr>
                    <th>External URL</th>
                    <td><a href="/tools/website-debugger/{{isset($scraped_data->external_url) ? parse_url($scraped_data->external_url)['host'] : $scraped_data->external_url}}">{{ $scraped_data->external_url }}</a></td>
                </tr>
                <tr>
                    <th>Media count</th>
                    <td>{{ number_format($scraped_data->media_count) }}</td>
                </tr>
                <tr>
                    <th>Last post</th>
                    @if($scraped_data->avg_dataset_end)
                        <td>{{ \Carbon\Carbon::parse($scraped_data->avg_dataset_end)->diffForHumans()}}</td>
                   @else
                        <td>No recent posts</td>
                    @endif
                </tr>
                <tr>
                    <th>Average amount of likes per post</th>
                    <td>{{ number_format($scraped_data->avg_likes_count) }}</td>
                </tr>
                <tr>
                    <th>Average amount of comments per post</th>
                    <td>{{ number_format($scraped_data->avg_comments_count) }}</td>
                </tr>
                <tr>
                    <th>Followers</th>
                    <td>{{ number_format($scraped_data->followers_count) }}</td>
                </tr>
                <tr>
                    <th>Following</th>
                    <td>{{ number_format($scraped_data->following_count) }}</td>
                </tr>
                <tr>
                    <th>Follower to following ratio health</th>
                    <td class="text-{{ $scraped_data->followers_count/$scraped_data->following_count > 3  ? 'muted' : 'primary' }}">{{ $scraped_data->followers_count/$scraped_data->following_count > 3 ? 'Healthy' : 'Degraded' }} ({{round($scraped_data->followers_count/$scraped_data->following_count, 1)}} followers per following)</td>
                </tr>
                <tr>
                    <th>Engagement health</th>
                    <td class="text-{{ ($scraped_data->avg_likes_count/$scraped_data->followers_count)*100 > 5  ? 'muted' : 'primary' }}">{{ ($scraped_data->avg_likes_count/$scraped_data->followers_count)*100 > 5 ? 'Healthy' : 'Degraded' }} ({{round(($scraped_data->avg_likes_count/$scraped_data->followers_count)*100, 1)}}%)</td>
                </tr>
                <tr>
                    <th>Private</th>
                    <td class="text-{{ $scraped_data->is_private  ? 'primary' : 'muted' }}">{{ $scraped_data->is_private  ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Verified</th>
                    <td class="text-{{ $scraped_data->is_verified  ? 'muted' : 'muted' }}">{{ $scraped_data->is_verified  ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Last scraped</th>
                    <td>{{ $scraped_data->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th>Times scraped</th>
                    <td>{{ $account->scrapes_count }}</td>
                </tr>
                <tr>
                    <th>Is being scraped</th>
                    <td class="text-{{ $account->is_scrapeable  ? 'muted' : 'primary' }}">{{ $account->is_scrapeable  ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Qualifies for M Media services</th>
                    <td class="text-{{ $scraped_data->followers_count > 100 || $scraped_data->media_count >= 3  ? 'muted' : 'primary' }}">{{ $scraped_data->followers_count > 100 || $scraped_data->media_count >= 3 ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>ID</th>
                    <td>{{ $account->id }}</td>
                </tr>
                <tr>
                    <th>Instagram ID</th>
                    <td>{{ $account->instagram_id }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@if(!$account->is_scrapeable || (isset($hashtags) && $hashtags))
    <h2 class="mt-5 mb-0">Recent hashtags</h2>
    @if(isset($hashtags) && $hashtags)
    @foreach($hashtags as $hashtag)
        <a target="_BLANK" rel="noopener noreferrer" href="https://www.instagram.com/explore/tags/{{$hashtag}}">#{{$hashtag}}</a>
    @endforeach
    @else
        <div class="alert text-muted">
             There's currently no hashtags that you used in the most recent posts that we can show. <a target="_BLANK" rel="noopener noreferrer" href="https://help.instagram.com/488619974671134">Learn more on the Instagram help page</a>.
        </div>
    @endif

    <h2 class="mt-5 mb-0">Recent locations</h2>
    @if(isset($locations) && $locations)
    @foreach($locations as $location)
        <a target="_BLANK" rel="noopener noreferrer" href="https://www.instagram.com/explore/locations/{{$location['id']}}">📍{{$location['name']}} </a>
    @endforeach
    @else
        <div class="alert text-muted">
             There's currently no tagged locations from the most recent posts. <a target="_BLANK" rel="noopener noreferrer" href="https://help.instagram.com/488619974671134">Learn more on the Instagram help page</a>.
        </div>
    @endif

    <h2 class="mt-5 mb-0">Recently mentioned accounts</h2>
    @if(isset($users) && $users)
    @foreach($users as $user)
        <a href="/tools/instagram-account-analyzer/{{$user}}">{{"@".$user}}</a>
    @endforeach
    @else
        <div class="alert text-muted">
             There's currently no other accounts tagged in the most recent posts. <a target="_BLANK" rel="noopener noreferrer" href="https://help.instagram.com/627963287377328">Learn more on the Instagram help page</a>.
        </div>
    @endif

    <h2 class="mt-5 mb-0">Recent posts</h2>
    @if(isset($medias) && $medias)
    @foreach($medias as $media)
            <a class="action-section card mb-5 mt-5 round-all-round action-section-hover" target="_BLANK" rel="noopener noreferrer" href="{{$media->link}}">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{$media->displaySrc}}" class="card-img" style="object-fit: scale-down;" alt="M Media Marketing Bot">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{\Carbon\Carbon::parse($media->date->date)->diffForHumans()}}<span>{{ $media->location  ? " · ".$media->location->name : null }}</span></h5>
                    <p class="card-text">{{$media->caption}}</p>
                    <p class="card-text">
                        <small class="text-muted"><span>{{ number_format($media->likes) }} likes</span> · {{number_format($media->comments)}} comments</small>
                    </p>
                  </div>
                </div>
              </div>
            </a>
    @endforeach
    @else
        <div class="alert text-muted">
             There's no recent posts to show. <a target="_BLANK" rel="noopener noreferrer" href="https://help.instagram.com/488619974671134">Learn how to post on the Instagram help page</a>.
        </div>
    @endif
@else
    <h2 class="mt-5 mb-0">History</h2>
    @if(isset($account->scrapes) && $account->scrapes)
        <div class="table-responsive table-hover">
            <table class="table mb-0">
                <thead>
                    <tr>
                       <th>Date</th>
                       <th>Medias</th>
                       <th>Followers</th>
                       <th>Following</th>
                       <th>Engagement health</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($account->scrapes->reverse() as $scrape)
                    <tr>
                        <td>{{ $scrape->created_at->isoFormat('ll') }}</td>
                        <td>{{ number_format($scrape->media_count) }}</td>
                        <td>{{ number_format($scrape->followers_count) }}</td>
                        <td>{{ number_format($scrape->following_count) }}</td>
                        @if(!$scrape->is_private)
                        <td class="text-{{ ($scrape->avg_likes_count/$scrape->followers_count)*100 > 5  ? 'muted' : 'primary' }}">{{ ($scrape->avg_likes_count/$scrape->followers_count)*100 > 5 ? 'Healthy' : 'Degraded' }} ({{round(($scrape->avg_likes_count/$scrape->followers_count)*100, 1)}}%)</td>
                        @else
                        <td class="text-muted">Unknown, private account</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert text-muted">
             There's no history to show.
        </div>
    @endif
    <div class="alert text-muted">
         In order to minimize requests to Instagram, we scrape your account automatically no more than once a day and do not store all the data. If you do not want us to store historical data on this account, <a href="/contact">contact us</a>.
    </div>
@endif

<h2 class="mt-5 mb-0">Instagram content management</h2>
@if(isset($buffer) && $buffer && (Auth::user() && (Auth::user()->id == $account->user_id || Auth::user()->id == config('blog.super_admin_id'))))
{{--         {{var_dump($buffer)}}
--}}        <div class="table-responsive table-hover">
        <table class="table mb-0">
            <tbody>
                @foreach($buffer['counts'] as $count => $key)
                    @if($count != 'daily_suggestions' && $count != 'pending-story-groups-with-errors')
                    <tr>
                        <th>{{str_replace (["_", "-"], " ", ucfirst($count))}}</th>
                        <td>{{number_format($key)}}</td>
                    </tr>
                    @endif
                @endforeach

                @foreach($buffer['schedules'] as $day)
                    <tr>
                        <th>{{ucfirst($day['days'][0] ?? 0)}} posting time</th>
                        <td class="{{ isset($day['times'][0]) ? null : 'text-muted'}}">{{$day['times'][0] ?? "No posts"}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Service type</th>
                    <td>{{ucfirst($buffer['service_type'])}}</td>
                </tr>
                <tr>
                    <th>Instagram Content Management service ID</th>
                    <td>{{$account->buffer_id}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@elseif(isset($buffer) && $buffer)
    <div class="alert text-muted">
         You don't have permission to see data about this service for this account.
    </div>
@else
    <div class="alert text-muted">
         This account isn't linked to the <a href="/instagram-content-management">M Media Instagram Content Management service</a>. When you subscribe to this service, info about it will show up here.
    </div>
@endif

@endsection