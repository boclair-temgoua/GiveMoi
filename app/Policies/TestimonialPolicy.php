<?php

namespace App\Policies;

use App\User;
use App\Model\user\testimonial;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the testimonial.
     *
     * @param  \App\User  $user
     * @param  \App\Model\user\testimonial  $testimonial
     * @return mixed
     */
    public function view(User $user, testimonial $testimonial)
    {
        //
    }

    /**
     * Determine whether the user can create testimonials.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the testimonial.
     *
     * @param  \App\User  $user
     * @param  \App\Model\user\testimonial  $testimonial
     * @return mixed
     */
    public function update(User $user, testimonial $testimonial)
    {
        //
    }

    /**
     * Determine whether the user can delete the testimonial.
     *
     * @param  \App\User  $user
     * @param  \App\Model\user\testimonial  $testimonial
     * @return mixed
     */
    public function delete(User $user, testimonial $testimonial)
    {
        //
    }
}
