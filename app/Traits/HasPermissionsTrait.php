<?php

namespace App\Traits;

use App\Models\{Role, Permission};

trait HasPermissionsTrait
{
    public function givePermissionsTo(...$permissions)
  {
    $permissions = $this->getAllPermissions(array_flatten($permissions));

    if ($permissions === null) {
      return $this;
    }
    $this->permissions()->saveMany($permissions);

    return $this;
  }

  public function withdrawPermissionTo(...$permissions)
  {
    $permissions = $this->getAllPermissions(array_flatten($permissions));

    $this->permissions()->detach($permissions);

    return $this;
  }
  public function hasPermissionTo($permission)
  {
    return $this->hasPermissionThroughRole($permission)|| $this->hasPermission($permission);
  }

  public function hasPermission($permission)
  {
    return (bool) $this->permissions->where('name', $permission->name)->count();
  }

  public function hasPermissionThroughRole($permission)
  {
    foreach ($permission->roles as $role) {
      if ($this->roles->contains($role)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole(...$roles)
  {
    foreach ($roles as $role) {
      if ($this->roles->contains('name', $role)) {
        return true;
      }
    }
    return false;
  }
  public function hasARole($role)
  {
      if ($this->roles->contains('name', $role)) {
          return true;
      }
      return false;
  }

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'users_roles');
  }
  public function permissions()
  {
    return $this->belongsToMany(Permission::class, 'users_permissions');
  }
  protected function getAllPermissions(array $permissions)
  {
    return Permission::whereIn('name', $permissions)->get();
  }
}
