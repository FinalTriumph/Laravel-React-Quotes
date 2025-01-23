import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function Quotes() {
    const [quotes, setQuotes] = useState(null);

    function getQuotes() {
        axios.get('https://laravel-react-quotes.dev/api/quotes')
            .then(response => {
                setQuotes(response.data.quotes);
            }).catch(error => {
                console.error(error.message);
            });
    }

    useEffect(() => {
        getQuotes();
    }, []);

    function showQuotes() {
        if (!quotes) {
            return (null);
        }

        return (
            <div className="grid grid-cols-2">
                {quotes.map(quote => (
                    <div
                        key={quote.id}
                        className="flex flex-col max-w-sm bg-slate-100 text-slate-800 p-6 m-2 rounded-md"
                    >
                        <p className="font-bold">{quote.quote}</p>
                        <p className="mb-4">- {quote.author}</p>
                        <div className="flex mt-auto text-sm text-slate-600">
                            <p className="mr-auto">{quote.savedBy}</p>
                            <p>{quote.savedAt}</p>
                        </div>
                    </div>
                ))}
            </div>
        );
    }

    return (
        <div>
            {showQuotes()}
        </div>
    );
}
