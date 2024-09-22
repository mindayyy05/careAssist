<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Livewire\Livewire;
use Tests\TestCase;

class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function testApiTokenPermissionsCanBeUpdated(): void
    {
        // Skip test if API features are not enabled
        if (!Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
        }

        // Create a user with a personal team and authenticate
        $user = User::factory()->withPersonalTeam()->create();
        $this->actingAs($user);

        // Create an API token with initial permissions
        $token = $user->tokens()->create([
            'name' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => ['create', 'read'],
        ]);

        // Update the API token permissions using Livewire
        Livewire::test(ApiTokenManager::class)
            ->set('managingPermissionsFor', $token)
            ->set('updateApiTokenForm', [
                'permissions' => [
                    'delete',
                ],
            ])
            ->call('updateApiToken');

        // Refresh user tokens to check updated permissions
        $user->refresh();

        $updatedToken = $user->tokens->firstWhere('id', $token->id);

        // Assertions to verify permissions were updated
        $this->assertTrue($updatedToken->can('delete'), 'Token should have delete permission.');
        $this->assertFalse($updatedToken->can('read'), 'Token should not have read permission.');
        $this->assertFalse($updatedToken->can('create'), 'Token should not have create permission.');
    }
}
