<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigTableSeeder::class);
//        $this->call(HotelTableSeeder::class);
        $this->call(UserTableSeeder::class);
//        RENAME TABLE aboutme TO aboutMe;
//RENAME TABLE activationcode TO activationCode;
//RENAME TABLE airline TO airLine;
//RENAME TABLE countrycode TO countryCode;
//RENAME TABLE defaultpic TO defaultPic;
//RENAME TABLE goyeshcity TO goyeshCity;
//RENAME TABLE goyeshtag TO goyeshTag;
//RENAME TABLE innerflightticket TO innerFlightTicket;
//RENAME TABLE invitationcode TO invitationCode;
//RENAME TABLE offcode TO offCode;
//RENAME TABLE oponactivity TO opOnActivity;
//RENAME TABLE picitems TO picItems;
//RENAME TABLE placestyle TO placeStyle;
//RENAME TABLE reportstype TO reportsType;
//RENAME TABLE retrievepas TO retrievePas;
//RENAME TABLE sectionpublicity TO sectionPublicity;
//RENAME TABLE soldticket TO soldTicket;
//RENAME TABLE soldticketitems TO soldTicketItems;
//RENAME TABLE specialadvice TO specialAdvice;
//RENAME TABLE statepublicity TO statePublicity;
//RENAME TABLE ticketnotify TO ticketNotify;
//RENAME TABLE tripcomments TO tripComments;
//RENAME TABLE tripmembers TO tripMembers;
//RENAME TABLE tripmemberslevelcontroller TO tripMembersLevelController;
//RENAME TABLE tripnote TO tripNote;
//RENAME TABLE tripplace TO tripPlace;
//RENAME TABLE tripstyle TO tripStyle;
//RENAME TABLE useropinions TO userOpinions;
//RENAME TABLE userphoto TO userPhoto;
//RENAME TABLE usertripstyles TO userTripStyles;
    }
}
