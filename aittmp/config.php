; <?php die('Forbidden'); ?>  -*- conf -*-
; Do not remove the above line, it is all that prevents this file from
; being downloaded.
;
; config.php file for PHP Shell
; Copyright (C) 2005-2010 the Phpshell-team
; Licensed under the GNU GPL.  See the file COPYING for details.

; This ini-file has three parts:
;
; * [users] where you add usernames and passwords to give users access
;   to PHP Shell.
;
; * [aliases] where you can configure shell aliases.
;
; * [settings] where general settings are placed.


[users]

; The default configuration has no users defined, you have to add your
; own (choose good passwords!).  Add uses as simple
;
;   username = "password"
;
; lines.  Please quote your password using double-quotes as shown.
; The semi-colon ':' is a reserved character, so do *not* use that in
; your passwords.
;
; For improved security it is *strongly suggested* that you the
; pwhash.php script to generate a hashed password and store that
; instead of the normal clear text password.  Keeping your passwords
; in hashed form ensures that they cannot be found, even if this file
; is disclosed.  The passwords are still visible in clear text during
; the login, though.  Please follow the instructions given in
; pwhash.php.
;Example:
zabludny = "sha1:690c16f4:6a03ada53f232b8709224b686d50fa7df4c4f30d"



[aliases]

; Alias expansion.  Change the two examples as needed and add your own
; favorites --- feel free to suggest more defaults!  The command line
; you enter will only be expanded on the very first token and only
; once, so having 'ls' expand into 'ls -CvhF' does not cause an
; infinite recursion.

ls = "ls -CvhF"
ll = "ls -lvhF"



[settings]

; General settings for PHP Shell.

; Home directory.  PHP Shell will change to this directory upon
; startup and whenever a bare 'cd' command is given.  This can be an
; absolute path or a path relative to the PHP Shell installation
; directory.

home-directory = "."

; Safe Mode warning.  PHP Shell will normally display a big, fat
; warning if it detects that PHP is running in Safe Mode.  If you find
; that PHP Shell works anyway, then set this to false to get rid of
; the warning.

safe-mode-warning = true

[ait_allowed_ips]
aitoc1 = 86.57.152.172
aitoc2 = 80.249.82.61
aitoc3 = 208.79.143.156
aitoc4 = 86.57.157.6