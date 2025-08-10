{ pkgs, lib, config, inputs, ... }:

{
  packages = [ pkgs.wp-cli ];

  languages.php.enable = true;
}
