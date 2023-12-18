import React from "react";
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import Image from "next/image";

const CartTable = () => {
  return (
    <>
      <Table className="w-full ">
        <TableCaption>Danh sách sản phẩm bạn đã thêm</TableCaption>
        <TableHeader className="whitespace-nowrap">
          <TableRow>
            <TableHead className="">Sản phẩm</TableHead>
            <TableHead>Kích thước</TableHead>
            <TableHead>Màu sắc</TableHead>
            <TableHead className="text-right">Số lượng</TableHead>
            <TableHead className="text-right">Giá</TableHead>
            <TableHead className="text-right">Giá</TableHead>
            <TableHead className="text-right">Giá</TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow>
            <TableCell className="flex w-full min-w-[200px]  font-medium">
              <Image
                src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8c2hvZXN8ZW58MHx8MHx8fDA%3D"
                alt=""
                width={200}
                height={200}
                className="h-20 w-20 rounded-lg object-cover"
              />

              <p className="text_primary ml-2 truncate whitespace-nowrap text-sm font-semibold">
                Giày thể thaod
              </p>
            </TableCell>
            <TableCell>Paid</TableCell>
            <TableCell>Credit Card</TableCell>
            <TableCell>Credit Card</TableCell>
            <TableCell className="text-right">$250.00</TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </>
  );
};

export default CartTable;
