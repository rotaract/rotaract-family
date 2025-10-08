{ pkgs, ... }:

{
  packages = [
    pkgs.poedit
    pkgs.hunspell
    pkgs.hunspellDicts.de_DE
    pkgs.wp-cli
    pkgs.nodePackages_latest.svgo
  ];

  languages.php.enable = true;
}
