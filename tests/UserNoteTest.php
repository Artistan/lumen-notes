<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
# use Laravel\Lumen\Testing\DatabaseTransactions;
use \App\User;
use \App\Note;

class UserNoteTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_existing_user_can_add_a_note_test()
    {
        $user = new User([
            'name' => 'test',
            'email' => 'test'
        ]);
        $user->password = 'lkadnodkflns';
        $user->save();

        $response = $this->post('/notes',[
            'user_id' => 1,
            'note' => 'test note here'
        ]);

        $response->assertResponseOk();
        $this->assertEquals(1, Note::all()->count());
    }

    /**
     * @test
     */
    public function not_a_user_cannot_add_a_note_test()
    {
        $response = $this->post('/notes',[
            'user_id' => 1,
            'note' => 'test note here'
        ]);

        $response->assertResponseStatus(500);
        $this->assertEquals(0, Note::all()->count());
    }
}
