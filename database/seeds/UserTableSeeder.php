<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::insert('INSERT INTO users (id, first_name, last_name, email, picture, link, created_at, username, phone, password, remember_token, updated_at, status, uploadPhoto, cityId, level, invitationCode, api_token) VALUES (1, "", "", "mgh7264@gmail.com", "", "", "2017-09-03 08:09:49", "mohsen", "", "$2y$10$H3K8z4zN2mAU.tDNZL5cVeRjnEoCmj56IRBke.wbDIQdMMAiEoLji", "6srIXHqqj0vObx7di44BrkGo1FOlR26YU3lGojcK0UxHVJKHHp8JOwkXDF59", "2017-09-03 08:05:21", 1, 0, 361, 0, "", null);');
        

        \Illuminate\Support\Facades\DB::insert('INSERT INTO users (id, first_name, last_name, email, picture, link, created_at, username, phone, password, 
remember_token, updated_at, status, uploadPhoto, cityId, level, invitationCode, api_token) VALUES (2, "mohammad", 
"ghaneh", "mghaneh1375@yahoo.com", "4", "https://plus.google.com/116376450214857106642", "2017-07-01 05:44:00", 
"mghaneh1375", "09214915906", "$2y$10$H0zYGwQwW6sDzzbOrRkerer/t43.pfB5wvKBkXC3/rfg.d0k8coTS", 
"YBcOX7GQIeyDa8UJXD5qMEZCeWBj5GGOLvcuPyGWY7Px4c6z33genxFUz3ra", "2018-01-28 04:25:38", 1, 0, 6, 0, "", null), (3, "محمد", "قانع", "mghaneh1375@yahoo.com", "2", "", "2017-07-01 05:44:00", "admin", "09214915900", "$2y$10$PFJCJRLAPhRMNLL81Wmtl.aPppjH6mmkXXOMqj5S7ccSzNeSQeU7q", "bHaNMOdY9LsOa5VnhiuVyVsVmf6sEo8LkHEWj0vqK903vkW6UMCig2HjUp8G", "2018-04-09 10:04:03", 1, 0, 6, 1, "12342", "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg1OWRmMTFjODczZDk5MDhkMjUwMWI2MTI0ZDUyYzVlOWE5ZTJiYTA0MjNkOTA2ODE3MWM0MTRjOWM4ZDVkYmUwZjA5M2Q1MTAxMTZjYzYxIn0.eyJhdWQiOiI0IiwianRpIjoiODU5ZGYxMWM4NzNkOTkwOGQyNTAxYjYxMjRkNTJjNWU5YTllMmJhMDQyM2Q5MDY4MTcxYzQxNGM5YzhkNWRiZTBmMDkzZDUxMDExNmNjNjEiLCJpYXQiOjE1MjMyNjgyNDMsIm5iZiI6MTUyMzI2ODI0MywiZXhwIjoxNTU0ODA0MjQzLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.TTOwJE1S4O-UGgFK203ufMZFgYYlzuvTCQwDa0GjBYITwqx-DkgIq12vziduifS_e7K_p3qug7XLtpIbAfDMlp3DfXFNAjM5G1X1uCKOn-jWPDuYTXsqqYxmA2DAviv176nLskIkRziOlDulmK7n-QzKqnU0aWGrEljT9qgUDkD4O56r7I9EMyGeh8_gbdhHjyDFqKM2bC5eZOkVPhU44GAZXgVI2JifVrY546jD0XMNxuIGAiwVeCz2Il_lnW-6FAP5XIs_2o9XifyswdcMKV72Tn7lJD17YjogFac-UYAfUrEx_T6RohNEhBXFdZebiFI6chzpuV36dFFgdMyOm8JoW8NK0wO2WoNyrNe6XksRnEjMTlgZNaF_1Yhd3quX8o1GX7yJQAJuv-DDjFm532RVaMMztHN1dVBzwlpS9dY-aJZp4HWTDvMSaOrQUq5kVF_S7dVfV0KtpQVGhxO5W1VyQ-BhzLGcJzKv7PCIKpXHu3AwQw2jFsaOimrIYLyft1kKqSS4ajQ_PAA2wRLtxuz0InHqL1akyNTIkygxkIQ8JxZVJUtSd1F8mMjBtgZpIv2MgBVHeoZ8IxuLbLz7Udciq9RON7ODwM7RIuOje6d8jBcQv9NHl9q4wR-IllGXxvdmMeoANtqz_M0Eum6V9W4jM7E-qBMiZ2TMpaqKDr0"), (4, "", "", "mv_bighaede@yahoo.com", "", "", "2017-09-03 08:09:38", "ali", "", "$2y$10$3j
.C4/1D4rKrB8P2d1pRYu9TAVbeQsoH5890XFFmNwvJgphpRvyJW", "e0ofkXbLsxUGVzcQ9GVrCleGdm5dGukuRrcntLjYra4YW3MrILN6g36bzJeQ",
 "2017-11-29 09:19:40", 1, 0, 361, 0, "", null), (5, "", "", "", "", "", "2017-09-03 11:09:04", "alireza", 
 "09214915907", "$2y$10$QPziiNhKdESJXNzEyF6iVOr0P33xttT7eEKHavX4YobBKBDW89nQ2", 
 "IEIyOuX0GM4OB45Tt91wE9bYYb2mHMZqwkKrjYiAUMAzVfQR9aRzcAFTWE5i", "2017-09-04 05:24:34", 1, 0, 361, 0, "", null), (15, "", "", "", "", "", "2017-09-04 12:09:22", "ahmad", "09214915908", 
"$2y$10$EKVP2HgsBuiRstG00grD4exmZ0Xt8SbtYzInlCScYUQ1F/doBQ8Ii", 
"yTFveGqzStU3nShe0e44nenMSgyiqhgbjS6NDHFLfRFjxwIJi2JPW0VBdw7w", "2017-09-06 07:52:47", 1, 0, 361, 0, "", null), (17, 
"", "", "", "", "", "2017-10-29 02:10:53", "salambarto2", "09214915905", 
"$2y$10$iZiONBZ2x50tLzlhQY62WukKZL94E1jX1xUJK2DERUkIxAJx9/un.", 
"X15LZkYEpMeX5yJcmZMn9EJUrhCE6yBLmx3et3Q2VFgAeA3S9r3izaOvVV7U", "2017-11-03 17:15:20", 1, 0, 361, 0, "217072", null),
 (18, "سینا", "عادلی", "", "", "", "2017-10-29 02:10:00", "Shazdesina", "09123840843", "$2y$10$7JdTHiylXAUs5W
 .8gi1RqeQxTc.nhc8WqCfNtFEQ4c5b949Fj8JZa", "gSbXWNsG3w6lxLHMPkJtHKQdIIgv8OsRBIBMnkXqwWCiW4KVFAYJW6nJrltp", 
 "2018-06-11 13:05:04", 1, 0, 361, 0, "544331", null), (19, "", "", "", "", "", "2017-10-31 11:10:32", "shazdetest", 
 "09120239315", "$2y$10$C/Mu7IPHcdMZrfDpsap92O4ri/JmNUvrxrKQsxjxZv1sHMkQfcLji", 
 "CqmeDJdQWUlvQdFmYELpT7BKa0sWrBiGzBvvY17RSmwE61AHDM8BV6INtA68", "2017-10-31 11:37:41", 1, 0, 361, 0, "371487", null)
 , (20, "", "", "", "", "", "2017-11-04 09:11:03", "behkhazaei", "09128084120", "$2y$10$vdVhdMtrJofhlUzM2FbUk
 .COuenAyZLZIHI.20uSt5vzrkRck4wh2", "pVsFf6TXK9Lfed437YA8VWP5hNSSUk43x4xkz310KqbidbJ4hsZPEQ41N8xs", "2017-11-13 
 10:31:13", 1, 0, 361, 0, "247351", null), (21, "", "", "", "", "", "2017-11-04 09:11:59", "farid", "09211347843", 
 "$2y$10$wC6iyn5kN/3uHQizuUyXZ.oxO32m9.fitIQ/QwHz8aGMOSp5XiqmO", 
 "6NkrBR27coiDDAyA1NbKMKE24683IdoGrus8EsgHyMjKz0wf5O7oiQcPmpTB", "2017-11-04 09:31:59", 1, 0, 361, 0, "517620", null)
 , (22, "mohammad ghane", "", "mghaneh1375@gmail.com", "https://lh3.googleusercontent
 .com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg", "https://plus.google.com/116376450214857106642", 
 "2017-11-06 13:10:27", "116376450214857106642 ", "", "$2y$10$AU3woAbGT9CKDCmEz2nieeYrJddPwZ1AfcmPe4xr96oYAV5/tkjwW",
  "yTWSXpkxYL4zp9jw9xeHc5HkUgaPMDIE47PrAZWZ4mXQnKT2djnkgNDQxGGx", "2017-11-06 13:10:37", 1, 0, 361, 0, "", null), 
  (24, "sina adeli", "", "sina.adeli.k@gmail.com", "https://lh6.googleusercontent
  .com/-rUwwhhijrSA/AAAAAAAAAAI/AAAAAAAAAHw/d0bKw1vd6T8/photo.jpg", "https://plus.google.com/100030416816967567450", 
  "2017-11-06 15:19:20", "100030416816967567450 ", "", "$2y$10$VeqUCv8SVytcNYuoG0
  .R1uKeoGZBg5R0W6x74rKlsIFG7uFFy/TXO", "vQHEJibxvZFMmkJ8G4YHciOwFkbN3AYEeSsLGsNIPVsQjrXgDd1tLHE9WyPs", "2017-12-03 
  20:21:20", 1, 0, 361, 0, "", null), (25, "", "", "mghaneh754@gmail.com", "", null, "2017-11-08 06:11:17", 
  "hasanali", "", "$2y$10$4goKSu1YN91m8qQ6.AVw8OIyIjHFWWtv6NZpQlsyExL/6Ch8jUD0G", 
  "U3rKcLyi69CixRExkutMU1klJRWlDuzRvR753cRk5FhV9MLp8oarxIQZxNf2", "2017-11-08 06:59:17", 1, 0, 361, 0, "610936", 
  null), (26, "Muhammad", "Salehi", "salehi1994@gmail.com", "https://lh5.googleusercontent
  .com/-sxAl5n0EtoM/AAAAAAAAAAI/AAAAAAAAESI/RGsIB3Wi_3o/photo.jpg", "https://plus.google.com/+MuhammedSalehi", 
  "2017-11-26 04:48:25", "Muhammad Salehi", "", "$2y$10$pFO9VH.sXh/zv7RVqGl3WuZa.lnYVXGmUoztYChjpNoUuwIX.mcBu", 
  "me1mB9p0iC5kxAj7rzfC8yqMWV9066q0LD72raoDSc5Ltpu9vDvqGAXAjNsx", "2017-12-30 01:43:19", 1, 0, 6, 0, "", null), (27, 
  "Bogen", "Game", "bogengames@gmail.com", "https://lh4.googleusercontent
  .com/-S-oWK0LK-tE/AAAAAAAAAAI/AAAAAAAAAA4/AnJZWyaPfD8/photo.jpg", null, "2017-11-29 09:32:50", "Bogen Game Studio",
   "", "$2y$10$.lmGrAq8mbg0uGkFJnBckOsPun6rE5gR1xnzv6Rb0HMveTuOVk5Bm", 
   "Vx3h4FFxwY4WmduH169zA3Rd8WYpI4B1rB6oFhP1Oto5QbNvFArgL8G4QUZC", "2017-12-12 10:56:49", 1, 0, 6, 0, "", null), (28,
    "Soore", "Vahedzade", "soore.vahedzade@gmail.com", "https://lh4.googleusercontent
    .com/-LA4iBIADDW4/AAAAAAAAAAI/AAAAAAAAACY/Mv91G5qpdVI/photo.jpg", "https://plus.google
    .com/105203587503744419189", "2017-11-29 09:33:47", "Soore Vahedzade", "", 
    "$2y$10$N8Jcwka8c/gjvJ8Rg95vpeZwFQ2wNAl2wE0kJtHx6O6eN8WfUiTle", "", "2017-11-29 09:33:47", 1, 0, 6, 0, "", null),
     (32, "sina", "Adeli", "shazdemosafercred@gmail.com", "https://lh3.googleusercontent
     .com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg", null, "2017-12-09 06:47:23", "sina Adeli", "",
      "$2y$10$Qpb3wg9LW9hoY4TJvJrakeYO3pIWC3fioFr101gZi66PKvnprXCs2", 
      "6v6aWELXKU2FLpyZVBeD5atoeDYTeV0a9x9g1Pf0Wf9Dx3RprHhfqncR4YHN", "2017-12-09 07:20:12", 1, 0, 6, 0, "", null), 
      (34, "", "", "mghaneh2375@gamil.com", "", null, "2017-12-09 07:12:25", "mamadw", "", 
      "$2y$10$EOYDhv4kUg8VwtDbBdpl3uUDvF79HbgPfgbJLlvftExfwtP45I9pm", 
      "osKm3sicMdxPPHAo0YEHTrzBT3Nb26y6xa3MdfvJIvnKWQsD67QiwoZOHRu2", "2017-12-09 07:24:30", 1, 0, 6, 0, "393798", 
      null), (36, "", "", "mghaneh1375@outlook.com", "", null, "2017-12-29 10:12:55", "salamkachal", "", 
      "$2y$10$7M0ag50Asay/CFxPEAHHau/G2U8czGDbBp4YvogrNAbcVs3sAY94.", 
      "aGPuzzDXrkPBU9qPCIgXcvwE7hPjYK6SjyKYsBJiBHd1N9i4GJ33ozbgmAAE", "2017-12-29 10:46:55", 1, 0, 6, 0, "965407", 
      null), (37, "", "", "fchegini33@gmail.com", "", null, "2018-01-10 04:01:03", "Farid23", "", "$2y$10$zAQ1MwYA0t
      .5472uiVvJW.yj7grCuIVLtivECkfjcoIQF0X8P9ZO.", "fHlOYp4L71MXS6W3To89xoFdndzT4E0mmxdL6a868ncMyiR11ovilNDOpUWG", 
      "2018-01-10 16:31:03", 1, 0, 6, 0, "257132", null), (38, "Yahya", "Saadat", "mr.yahya.saadat@gmail.com", 
      "https://lh6.googleusercontent.com/-yQAZfL74YwU/AAAAAAAAAAI/AAAAAAAAElQ/NTzwfnZswO4/photo.jpg", "https://plus
      .google.com/+YahyaSaadat", "2018-01-23 08:13:39", "Yahya Saadat", "", 
      "$2y$10$BgdTH7v91seX9fbo1v4YYuNJJlNK3M3B6sXM4yXQwiof7opqsmFJ.", 
      "5YlSe7bVnf4fF5o8OWja7ktzCkULI2Qz9CatZxVRoOofCzZBNxlvcwuRaYf9", "2018-01-23 08:13:39", 1, 0, 6, 0, "", null), 
      (39, "", "", "", "", null, "2018-01-29 11:01:20", "rrezvani", "", 
      "$2y$10$8dpEouoGXl61ukPwx2cMqu8MFgpfu9IT03dkBV2TUk160cQBRfwxy", 
      "mNxvI2yLTt9LEyiNUhsHcDFApasJ2yGeLcwkqbBGBJi3YAILjCxJRabAwPsB", "2018-01-29 11:12:20", 1, 0, 6, 0, "856253", 
      null), (40, "", "", "", "", null, "2018-02-12 10:02:46", "بهزاد", "", 
      "$2y$10$Kz0o25WVsr6JUmXmieDvVeziUZL7Aj7i73/ib7y4y7RVOfKQD.szG", "vRSXt0ySYsWnqDae5ZkAq7ig7QOEao430FRVzep80ZOM55LPG67JVshum9oS", "2018-02-12 22:26:46", 1, 0, 6, 0, "654407", null), (44, "Mohammad", "Alipour", "mghaneh2132175@gmail.com", "https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg", null, "2018-03-10 14:09:20", "Mohammad2 Alipour", "", "$2y$10$26g5lG2KwWOPjeMZVEArxum/RJzQJzrDxXS5GbMvzii7ZWUPZTYSG", "WCp99evoLqTUdJVtvIowKdtznYGpm0fQeVquZ5jkykoMQnNJWHqnrlfqXLfG", "2018-04-07 08:06:39", 1, 0, 6, 0, "", "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgxNWZkODI1M2M0MjUxZmY0MzRhNGY1NDkxNmRhYjcwZjZhNTNlNWJkZTJiZjUxZWMyNmQ3Yjg2NWE3ZTVlNjkxOGRhYzFmZTUwYmI5M2IzIn0.eyJhdWQiOiI0IiwianRpIjoiODE1ZmQ4MjUzYzQyNTFmZjQzNGE0ZjU0OTE2ZGFiNzBmNmE1M2U1YmRlMmJmNTFlYzI2ZDdiODY1YTdlNWU2OTE4ZGFjMWZlNTBiYjkzYjMiLCJpYXQiOjE1MjMwODgzOTksIm5iZiI6MTUyMzA4ODM5OSwiZXhwIjoxNTU0NjI0Mzk5LCJzdWIiOiI0NCIsInNjb3BlcyI6W119.kG2a3LIrDv8ZyOWa40U8GOVrT1_67zNcBGtfGgdQVYHE3wFPkMDlME_iiJvYJW90lg9TPzkHTfe8VGWY34rL_FjDmfrprcIYFRfu2q1nvEPyUz_9K88p-WAvZuuh5dnjEfAKS1CUdqkE9JboShZUX8bLf-0vN-u5EUGtAYf6EuQLVtNxd1B9Hy61Iwca3vUggqUF1UoK9E4vIRjFxh_fDD3q5BGLDm5CKD2ZSt-NeICfgoNxX5UoIlb7eUoNzaumOfUCV9MI2GCPjvPWyrfhQFt2hjQS8HNmKknmJyixsdCwQLhCU9HNcF0xF4AN2-v_SfUTb8TgWbdRzFne6DuiR4n9jqTMLQapLu7XPfx_URRddXaK9smoIKHcHCUeq0EsZsumf1OauZ8LVPAGRz0uKVl-KkgRbLWV3NZdZ26N0XhPwr27p9_8chYwTvoMMf_wGSxKjb9QGiWQQjKELxk56G6ooTOhR7MgfWezYeG-X3ViKhGxNwaMBpDeBFrOdc8A-Q86ObVYA2Sw5zmFfkhvatCSx1ZgYfPAoJKV2-tVGcinlbSa2IGIAcDJ_W8u0ASyrZPzmYehgLu48KdFjiiJVpj6sxbbgMT8-Oq1L2hsL-GNnVpXHrscVyPIETcy4K-6T0_k1kDGHW2gpX30y1RfDVfhoKcutBG3qO4ZVg89rrs"), (45, "کیاوش", "زارع پور", "kiavashriddler@gmail.com", "", null, "2018-03-15 11:03:33", "kiavash", "09122474393", "$2y$10$lnAnjUMvJaUSVW534ZlN4e3w7kYSQrNceldSEdj16z4Nq1gLEfSGG", "UinTtT8VT7hUzH1UDXmIu0E3zxgKVq2BAxiumwCmnxPayiR0X5BykHczbTLd", "2018-04-11 13:49:35", 1, 0, 361, 0, "775414", null), (46, "", "", "mkiavashridddler@gmail.co", "", null, "2018-03-23 12:03:25", "mkia", "", "$2y$10$I7xbeQNmnq/iITHJMNENq.8ma9mj2SFNwY/N.dh5NpaIELQIYw4Wm", "LJmtsuYqme8F6UCc1iy1Ok3QUlCAILFpA3o5X97VfnwG4O8gUKnFlPwwFGWc", "2018-03-23 12:03:25", 1, 0, 6, 0, "689596", null), (47, "", "", "", "", null, "2018-03-25 10:03:52", "akbar alizadeh", "", "$2y$10$RJ0rKq9L7q9zNYoXnRofuunCx6XLDQ64x/RoDD3cHIEeLgMlOflP.", "MTmdxaYIvE8zWPJKuPYipyflifQ9ng72Tvhq6dkTEDMbjKS1S7VFZlXDlKis", "2018-03-25 10:03:52", 1, 0, 6, 0, "863831", null), (49, "Bogen", "Design", "bogendesign.khn@gmail.com", "https://lh4.googleusercontent.com/-7rSB4BBISU4/AAAAAAAAAAI/AAAAAAAAABM/1galWYYXaVQ/photo.jpg", "https://plus.google.com/103891576757585044689", "2018-04-08 14:02:07", "Bogen Design", "", "$2y$10$cuE35aDfO1C3cyh45xPHveUWb6YIi5XoEOE.czp.C3e7cmulxxeBy", "E1WyZhJY9Ndf8qQgWHHYOWZkErlXsjwQHS4wdZ08uK7PdreVIfPqi5A3s9lM", "2018-04-08 14:02:07", 1, 0, 6, 0, "", null), (52, "Mohammad", "Alipour", "mghaneh75@gmail.com", "https://lh6.googleusercontent.com/-36I3xBmNodA/AAAAAAAAAAI/AAAAAAAAAAA/ACLGyWDanvGGTYCsFGuT9DKPNHkreEQGIw/s96-c/photo.jpg", null, "2018-04-08 12:24:54", "Mohammad Alipour", "", "$2y$10$fGHAQ4AcuG0KSOUB6EIhNOR7d0PFK9GCsmWuusTszp5w7JyGpVjLy", "MrWTJyW4ul8HnlOc1XzQEG3XeNo8VJuVOWsZe74G7DiPZwi6xC7C70SkS2cw", "2018-04-08 12:24:54", 1, 0, 6, 0, "", "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjlhODE3OTdiNjU4ZGYyNzVhM2E2YTRlOWNlNDhlYmQ2ZjkxOGQyNDZmYTM5NjdlNWNlMjA3ZjRiNjc1OTFlZTRiNmFjNzZiZWIyODlmYmMyIn0.eyJhdWQiOiI0IiwianRpIjoiOWE4MTc5N2I2NThkZjI3NWEzYTZhNGU5Y2U0OGViZDZmOTE4ZDI0NmZhMzk2N2U1Y2UyMDdmNGI2NzU5MWVlNGI2YWM3NmJlYjI4OWZiYzIiLCJpYXQiOjE1MjMxOTAyOTQsIm5iZiI6MTUyMzE5MDI5NCwiZXhwIjoxNTU0NzI2Mjk0LCJzdWIiOiI1MiIsInNjb3BlcyI6W119.MN2-MHC5wdVW_1TqgHIxFe034B_OJOsp2MMN_xwGrFIkVShUsWdW2eXKTGZtWPTcMPygKej0kz6oYZgHOAg1tUWt6cADVRVjzupmMDEUk1Blt_0odj0rhOaSzZ8Mr08v1p904iY9DSEW-aRJB4eqSNPDhZN8b9Kjm6c8C7_WdqE8uIW2RHq8TOXJAbt2EfL3I0ciYRGzSHKLYP20w2z95dClZtBvQNs0nqpsVbN97sqk3DIQ9ziV8f-LGGAasgja3yjWxU1W64bfZONrUeAYVGv5YfPjFunYt82Dt7vZFtzSEHAbECN0OsK740LyozEFo1E-A0GQmvNWqSdpaZpMmNuHourSmbZQIv9Jr6_l6WL8iTOlaZHkn3GSYJigDuMlPDWzAe092E8urc5R-ikuu8YnazzXtSmyivhJi3_1hntvxd2ezI2ADpIQfEaj1omUwwmWqQn0PoaSqzvACwq_Fe4LvG74woSwOcSS9Zb_k5v6uWGZsbSGxYJE8KUDlWaddAL9vzsJ7MxOcsed_K1fxt4_mo9pPd3Q9djt-KytlbgtemSTZjFT381jLC_PDoFIsCait1JJAG1SWhW7DsfPU9uf3bpwDmJSPIcITCTzW5mSWkNLEE_em_GeL5Me03fkDpuHYqKKmRoiv7KKYPylVQQaxcVaZrDW30FbbWFtNq8"), (54, "", "", "", "", null, "2018-04-23 11:04:33", "salehi", "", "$2y$10$GEIAXaUKZ2RvaBfpXAaTTO.0MadCf5DK1SfQUMOrSLOIH4u4jMA/O", "XzSCE1bU1G6VAQi54Sj25vflY92XvdCYGW0B8nif0Egq2fjt8YjMTtb3vFqk", "2018-04-23 11:04:33", 1, 0, 6, 0, "496447", null), (55, "", "", "nonosadat@yahoo.com", "", null, "2018-06-04 07:06:04", "Leila9019", "", "$2y$10$WYePQvgVcsqqwodUOY8MWuXK.cMW1v6Rev6t6JRwhB7cRgB5pOyzi", "1pALMGcncyhXowh4hdatcQzEW9YoLMTZZEigDZh14ghk4nTSHnyvD2ietrOd", "2018-06-04 07:06:04", 1, 0, 6, 0, "135996", null);');
        
        $this->call(LogTableSeeder::class);

    }
}
