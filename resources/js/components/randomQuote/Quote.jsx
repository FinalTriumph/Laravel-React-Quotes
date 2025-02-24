import React from 'react';
import Source from './Source.jsx';

export default function Quote({ quote, sourceTitle }) {
    if (!quote) {
        return (null);
    }

    const { source, text, author } = quote;

    return (
        <div className="mb-6">
            <Source source={source} title={sourceTitle} />
            <p className="font-bold">{text}</p>
            <p>- {author}</p>
        </div>
    );
}
