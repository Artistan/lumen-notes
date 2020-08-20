<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
# use Laravel\Lumen\Testing\DatabaseTransactions;
use \App\User;
use \App\Note;

class UserAuthTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_existing_user_can_log_in()
    {
        $user = new User([
            'name' => 'test',
            'email' => 'test'
        ]);
        $user->password = 'lkadnodkflns';
        $user->save();

        $response = $this->post('/authenticate',[
            'email' => 'test',
            'password' => 'lkadnodkflns'
        ]);

        // redirect to notes.
        $response->assertResponseStatus(302);
    }

    /**
     * @test
     */
    public function not_a_user_cannot_log_in()
    {
        $response = $this->post('/notes',[
            'user_id' => 1,
            'note' => 'test note here'
        ]);

        // unauthorized
        $response->assertResponseStatus(401);
    }
}
