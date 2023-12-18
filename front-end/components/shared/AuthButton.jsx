import { User } from "lucide-react";
import React from "react";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import Link from "next/link";
const AuthButton = () => {
  return (
    <>
      {" "}
      <DropdownMenu>
        <DropdownMenuTrigger>
          {" "}
          <User className="text_primary h-5 w-5" />
        </DropdownMenuTrigger>
        <DropdownMenuContent>
          <DropdownMenuLabel>Tài khoản</DropdownMenuLabel>
          <DropdownMenuSeparator />
          <DropdownMenuItem asChild>
            <Link href="/login">Đăng nhập</Link>
          </DropdownMenuItem>
          <DropdownMenuItem asChild>
            <Link href="/register">Đăng ký</Link>
          </DropdownMenuItem>
        </DropdownMenuContent>
      </DropdownMenu>
    </>
  );
};

export default AuthButton;
