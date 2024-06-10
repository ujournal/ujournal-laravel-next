<?php

namespace Tests\Unit;

use App\Models\Country;
use App\Models\Embed;
use App\Models\Media;
use App\Models\Poll;
use App\Models\PollQuestion;
use App\Models\Post;
use App\Models\PostAttachable;
use App\Models\PostComment;
use App\Models\PostView;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_that_user_created(): void
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(User::class, $user);
    }

    public function test_that_user_can_create_post(): void
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(["user_id" => $user->id]);

        $this->assertInstanceOf(Post::class, $post);

        $this->assertCount(1, $user->posts);

        $this->assertContainsOnlyInstancesOf(Post::class, $user->posts);

        $this->assertEquals($post->user->id, $user->id);
    }

    public function test_that_user_can_create_media(): void
    {
        $user = User::factory()->create();

        $media = Media::factory()->create([
            "user_id" => $user->id,
        ]);

        $this->assertInstanceOf(Media::class, $media);

        $this->assertCount(1, $user->media);

        $this->assertContainsOnlyInstancesOf(Media::class, $user->media);

        $this->assertEquals($media->user->id, $user->id);
    }

    public function test_that_user_can_create_embed(): void
    {
        $user = User::factory()->create();

        $embed = Embed::factory()->create([
            "user_id" => $user->id,
        ]);

        $this->assertInstanceOf(Embed::class, $embed);

        $this->assertCount(1, $user->embeds);

        $this->assertContainsOnlyInstancesOf(Embed::class, $user->embeds);

        $this->assertEquals($embed->user->id, $user->id);
    }

    public function test_that_user_can_create_poll_and_questions(): void
    {
        $user = User::factory()->create();

        $poll = Poll::factory()->create([
            "user_id" => $user->id,
        ]);

        $question = PollQuestion::factory()->create([
            "user_id" => $user->id,
            "poll_id" => $poll->id,
        ]);

        $this->assertInstanceOf(Poll::class, $poll);

        $this->assertInstanceOf(PollQuestion::class, $question);

        $this->assertCount(1, $user->polls);

        $this->assertCount(1, $user->pollQuestions);

        $this->assertContainsOnlyInstancesOf(Poll::class, $user->polls);

        $this->assertContainsOnlyInstancesOf(
            PollQuestion::class,
            $user->pollQuestions
        );

        $this->assertEquals($poll->user->id, $user->id);

        $this->assertEquals($question->user->id, $user->id);
    }

    public function test_that_user_can_create_post_attachable(): void
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(["user_id" => $user->id]);

        $embed = Embed::factory()->create([
            "user_id" => $user->id,
        ]);

        $attachable = PostAttachable::factory()->create([
            "user_id" => $user->id,
            "post_id" => $post->id,
            "post_attachable_type" => Embed::class,
            "post_attachable_id" => $embed->id,
        ]);

        $this->assertInstanceOf(PostAttachable::class, $attachable);

        $this->assertCount(1, $user->postAttachables);

        $this->assertCount(1, $post->postAttachables);

        $this->assertContainsOnlyInstancesOf(
            PostAttachable::class,
            $user->postAttachables
        );

        $this->assertInstanceOf(PostAttachable::class, $embed->postAttachable);

        $this->assertContainsOnlyInstancesOf(
            PostAttachable::class,
            $post->postAttachables
        );

        $this->assertEquals($attachable->user->id, $user->id);
    }

    public function test_that_user_can_create_post_comment(): void
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(["user_id" => $user->id]);

        $embed = Embed::factory()->create([
            "user_id" => $user->id,
        ]);

        $comment = PostComment::factory()->create([
            "user_id" => $user->id,
            "post_id" => $post->id,
            "embed_id" => $embed->id,
        ]);

        $this->assertCount(1, $user->postComments);

        $this->assertCount(1, $post->postComments);

        $this->assertContainsOnlyInstancesOf(
            PostComment::class,
            $user->postComments
        );

        $this->assertContainsOnlyInstancesOf(
            PostComment::class,
            $post->postComments
        );

        $this->assertInstanceOf(Embed::class, $comment->embed);

        $this->assertEquals($comment->user->id, $user->id);
    }

    public function test_that_user_can_create_post_view(): void
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(["user_id" => $user->id]);

        $country = Country::factory()->create();

        $postView = PostView::factory()->create([
            "user_id" => $user->id,
            "post_id" => $post->id,
            "country_id" => $country->id,
        ]);

        $this->assertCount(1, $user->postViews);

        $this->assertContainsOnlyInstancesOf(PostView::class, $user->postViews);

        $this->assertEquals($postView->user->id, $user->id);
    }

    public function test_that_user_can_create_profile(): void
    {
        $user = User::factory()->create();

        $profile = Profile::factory()->create([
            "user_id" => $user->id,
        ]);

        $this->assertEquals($user->profile->id, $profile->id);
    }

    public function test_that_user_can_create_tag(): void
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            "user_id" => $user->id,
        ]);

        $this->assertCount(1, $user->tags);

        $this->assertContainsOnlyInstancesOf(Tag::class, $user->tags);
    }
}
