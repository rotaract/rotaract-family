{ pkgs, ... }:

{
  packages = [
    pkgs.wp-cli
    pkgs.nodePackages_latest.svgo
  ];

  languages.php.enable = true;
}
